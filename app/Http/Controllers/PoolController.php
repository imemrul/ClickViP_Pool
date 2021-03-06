<?php

namespace App\Http\Controllers;

use App\Pool;
use App\Pool_facility;
use App\Pool_image;
use App\Weekly_session_timing;
use App\Weekly_session_wise_pool_price;
use Carbon\Carbon;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return auth()->user();
        if(auth()->user()->roll_id ==1){
            $results = Pool::orderBy('id','desc')->paginate(20);
            //return $pools;
            return view('admin.modules.pool.admin_manage_pool',compact('results'));
        }else{
            $results = Pool::where('host_id',auth()->user()->id)->orderBy('id','desc')->paginate(20);
            //return $pools;
            return view('admin.modules.pool.index',compact('results'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return Weekly_session_timing::where('host_id',auth()->user()->id)->get();
        return view('admin.modules.pool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $pool_master = $request->all();
        $pool_master['host_id'] = auth()->user()->id;
        $pool_master['slug'] = Str::slug($request->title,'-'); /// I know nothing about this
        if($request->has('allow_instant_booking')){
            $pool_master['allow_instant_booking'] = 'Yes';
        }
        $pool = Pool::create($pool_master);
        
        $dates = $this->getBetweenDates($request->start_date, $request->end_date);

        foreach ($dates as $date) {
            foreach ($request->weekly_session_timing[0] as $id=>$pirce){
                if($pirce && $pirce !== 0){
                    $session_wise_price = new Weekly_session_wise_pool_price();
                    $session_wise_price->weekly_session_id = $id;
                    $session_wise_price->date = $date;
                    $session_wise_price->price = $pirce;
                    $pool->session_wise_price()->save($session_wise_price);
                }
            }
        }
        // foreach($request->available_date as $i=>$date){
        //     if($date){
        //         foreach ($request->weekly_session_timing[$i] as $id=>$pirce){
        //             if($pirce && $pirce !== 0){
        //                 $session_wise_price = new Weekly_session_wise_pool_price();
        //                 $session_wise_price->weekly_session_id = $id;
        //                 $session_wise_price->date = $date;
        //                 $session_wise_price->price = $pirce;
        //                 $pool->session_wise_price()->save($session_wise_price);
        //             }
        //         }
        //     }
        // }
        if($request->hasFile('image')){
            foreach($request->file('image') as $file)
            {
                if($file){
                    $name = $pool->id.'_'.time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('uploads'), $name);
                    $image = new Pool_image();
                    $image->name = $name;
                    $pool->images()->save($image);
                }
            }
        }
        if($request->has('facility')){
            foreach ($request->facility as $item){
                $pool_facility = new Pool_facility();
                $pool_facility->facility_id = $item;
                $pool->facilities()->save($pool_facility);
            }
        }

        return redirect('module/pool')->with('message','Pool created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result =  Pool::with(['session_wise_price','session_wise_price.weekly_session_time_slot'])->find($id);

        //return $result->session_wise_price->groupBy('date');
        return view('admin.modules.pool.edit',compact('result'));
    }

    function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];
            
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
             
        for ($currentDate = $startDate; $currentDate <= $endDate; 
                                        $currentDate += (86400)) {
                                                
            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }
  
        return $rangArray;
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
        $i = count($request->weekly_session_timing[0]);
        //delete_session_time_slotreturn 'test';
        $pool = Pool::find($id);
        //return $pool->location;
        $pool_master = $request->all();
        
        $pool_master['allow_instant_booking'] = 'No';
        $pool_master['slug'] = Str::slug($request->title, '-');
        if($request->has('allow_instant_booking')){
            $pool_master['allow_instant_booking'] = 'Yes';
        }
        $pool->fill($pool_master)->save();

        $dates = $this->getBetweenDates($request->start_date, $request->end_date);

        foreach ($dates as $date) {
            foreach ($request->weekly_session_timing[0] as $id=>$pirce){
                if($pirce && $pirce !== 0){
                    $session_wise_price = new Weekly_session_wise_pool_price();
                    $session_wise_price->weekly_session_id = $id;
                    $session_wise_price->date = $date;
                    $session_wise_price->price = $pirce;
                    $pool->session_wise_price()->save($session_wise_price);
                }
            }
        }
        // foreach($request->available_date as $i=>$date){
        //     if($date){
        //         foreach ($request->weekly_session_timing[$i] as $id=>$pirce){
        //             if($pirce && $pirce !== 0){
        //                 $session_wise_price = new Weekly_session_wise_pool_price();
        //                 $session_wise_price->weekly_session_id = $id;
        //                 $session_wise_price->date = $date;
        //                 $session_wise_price->price = $pirce;
        //                 $pool->session_wise_price()->save($session_wise_price);
        //             }
        //         }
        //     }
        // }
        if($request->hasFile('image')){
            foreach($request->file('image') as $file)
            {
                if($file){
                    $name = $pool->id.'_'.time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('uploads'), $name);
                    $image = new Pool_image();
                    $image->name = $name;
                    $pool->images()->save($image);
                }
            }
        }
        if($request->has('facility')){
            $pool->facilities()->delete();
            foreach ($request->facility as $item){
                $pool_facility = new Pool_facility();
                $pool_facility->facility_id = $item;
                $pool->facilities()->save($pool_facility);
            }
        }

        return redirect('module/pool')->with('message','Pool updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pool = Pool::find($id);
        // dd($pool->images[0]->id);
        $this->delete_image($pool->images[0]->id);
        $pool->delete();
    }
    public function delete_image($id){
        $image = Pool_image::find($id);
        if(file_exists(public_path('uploads/'.$image->name))){
            unlink(public_path('uploads/'.$image->name));
        }
        $image->delete();
    }
    public function delete_session_time_slot($date){
        //return request()->pool_id;
        Weekly_session_wise_pool_price::where('pool_id',request()->pool_id)->where('date',$date)->delete();
    }

    public function pool_session_alert(){
        //return Carbon::now()->addDay(1)->toDateString();
        $results = Pool::where('host_id',auth()->user()->id)->paginate(20);
        $results->each(function($item){
           $item->total_booked_session = $item->session_wise_price()->where('date','>=',Carbon::now()->addDay(1)->toDateString())->where('status','Booked')->count();
           $item->remaining_available_session = $item->session_wise_price()->where('date','>=',Carbon::now()->addDay(1)->toDateString())->where('status','Available')->count();
        });
        return view('admin.modules.pool.session_wise_pool_alert',compact('results'));
    }
    public function status_update($pool_id){
        Pool::find($pool_id)->fill([
            'status' => request()->status
        ])->save();
        return 1;
    }
}

