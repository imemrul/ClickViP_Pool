<?php

namespace App\Http\Controllers;

use App\Client;
use App\Category;
use App\Client_medicine_requisition;
use App\Client_medicine_requisition_detail;
use App\Contact_person;
use App\Invoice;
use App\Medicine;
use App\Next_payment_date;
use App\Prescription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Psy\Command\ClearCommand;

class ClientCrud extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate',['except'=>['download_client']]);
    }

    public function index(Request $request)
    {
        //return 'test';
        //return auth()->user();
        $agents = User::where('roll_id',2)->get();
        $clients = Client::with(['agent'])->orderBy('name','asc')->paginate(30);
        return view('admin.modules.client.index',compact('request','clients','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.client.create');
    }

    public function get_clients(Request $request){
        $data = Client::where('name','LIKE','%'.$request->q.'%')->select('id','name','industry')->get();
        $data->each(function($item){
            $item->value = $item->id;
            $item->text = $item->name;
            unset($item->id,$item->name);
        });
        return $data->toArray();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_input_data = [
            'created_by'=>Auth::user()->id,
            'name'=>$request->name,
            'address'=>$request->address,
            'contact_no'=>$request->contact_no,
            'age'=>$request->age,
            'disease_type'=>$request->disease_type,
            'agent_id' => $request->agent_id,
        ];
        $client = Client::create($client_input_data);

        if($request->hasFile('file') || $request->prescription_date || $request->name_of_doctor || $request->speciality || $request->phone || $request->description){
            $prescription = new Prescription();
            //return $request->file('file');
            if($request->hasFile('file')){
                $prescription->attachment  = upload_image($request->file('file'));
            }
            $prescription->prescription_date = $request->prescription_date;
            $prescription->name_of_doctor = $request->name_of_doctor;
            $prescription->speciality = $request->speciality;
            $prescription->phone = $request->phone;
            $prescription->description = $request->description;
            $client->prescriptions()->save($prescription);
        }
        return redirect('module/client')->with('message','Patient created..');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        //return $client->deals;
        return view('admin.modules.client.client_details',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::with(['agent'])->find($id);
        return view('admin.modules.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        Client::find($id)->fill($request->all())->save();

        return redirect('module/client')->with('message','Patient updated..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
    public function search(Request $request){
        //return $request->all();
        $clients = Client::orderBy('name','asc');
        if(!empty($request->name)){
            $clients->where(function($query) use($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            });
        }
        if(!empty($request->agent_id)){

            $clients->whereIn('agent_id',$request->agent_id);
        }
        $clients = $clients->paginate(30);
        return view('admin.modules.client.index',compact('request','clients'));
    }


    public function download_client(){
        //return 'test';
        $data = [];
        $contact_persons = Contact_person::get();
        //return $contact_persons;
        $index = 0;
        foreach ($contact_persons as $contact_person){
            $data[$index]['client_name'] = $contact_person->client ? $contact_person->client->name : '';
            $data[$index]['contact_person_name'] = $contact_person->name;
            $data[$index]['contact_person_phone'] = $contact_person->phone;
            $data[$index]['contact_person_email'] = $contact_person->email;
            $index++;
        }

        $fileName = 'client_list.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        //return $data;
        $columns = array('Client Name', 'Contact Person Name', 'Phone', 'Email');
        //return $columns;
        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $row = [];
            foreach ($data as $result) {
                $row['client_name']  = $result['client_name'];
                $row['contact_person_name']    = $result['contact_person_name'];
                $row['contact_person_phone']    = $result['contact_person_phone'];
                $row['contact_person_email']    = $result['contact_person_email'];
                fputcsv($file, array($row['client_name'], $row['contact_person_name'], $row['contact_person_phone'],
                    $row['contact_person_email']));
            }
            fclose($file);
            //die($row);
        };
        return response()->stream($callback, 200, $headers);
    }
    public function prescription($client_id){
        $client = Client::find($client_id);
        return view('admin.modules.client.prescription_details',compact('client'));
    }
    public function create_prescription(Request $request, $client_id){
        $client = Client::find($client_id);
        $prescription = new Prescription();
        //return $request->file('file');
        if($request->hasFile('file')){
            $prescription->attachment  = upload_image($request->file('file'));
        }
        $prescription->prescription_date = $request->prescription_date;
        $prescription->name_of_doctor = $request->name_of_doctor;
        $prescription->speciality = $request->speciality;
        $prescription->phone = $request->phone;
        $prescription->description = $request->description;
        $client->prescriptions()->save($prescription);
        return redirect()->back()->with('message','Prescription Added...');
    }
    public function medicine_requisition($client_id){
        $client = Client::find($client_id);
        //return $client->medicine_requisition;
        $where_conditions = [];
        $medicine_requisitions_filter_by_date = [];
        if(request()->selected_date){
            $where_conditions[] = [
                'date_of_requisition','=',request()->selected_date
            ];
            $medicine_requisitions_filter_by_date = $client->medicine_requisition()->where($where_conditions)->get();
        }
        //return $medicine_requisitions_filter_by_date;
        return view('admin.modules.client.medicine_requisition',compact('client','medicine_requisitions_filter_by_date'));
    }
    public function save_medicine_requisition(Request $request,$client_id){
        //return $request->all();
        $requisition = Client_medicine_requisition::create([
            'client_id'=>$client_id,
            'date_of_requisition'=>$request->date_of_requisition,
            'created_by'=>auth()->user()->id,
            'remarks'=>$request->remarks,
        ]);
        //return $request->all();
        foreach($request->name as $i=>$row){
            //return $request->morning;
            if($request->medicine_id[$i] == 0){
                Medicine::create(['name'=>$row]);
            }
            $details = new Client_medicine_requisition_detail();
            $details->medicine_name = $row;
            $details->day = $request->morning[$i];
            $details->evening = $request->evening[$i];
            $details->night = $request->night[$i];
            $details->order_qty = $request->order_qty[$i];
            $details->discount = $request->discount[$i];
            $details->total_amount = $request->total_amount[$i];
            $details->after_discount = $request->after_discount[$i];
            $details->next_purchase_date = $request->next_purchase_date[$i];
            $requisition->requisition_details()->save($details);
        }
        return redirect()->back()->with('message','Requisition for medicine is sent');
    }

    public function search_medicine(Request $request){
        $data = Medicine::where('name','LIKE','%'.$request->q.'%')->select('id','name')->get();
        $data->each(function($item){
            $item->value = $item->id;
            $item->text = $item->name;
            unset($item->id,$item->name);
        });
        return $data->toArray();
    }



}

