<?php

namespace App\Http\Controllers;


use App\Location;
use Illuminate\Http\Request;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $results = Location::orderBy('id','desc')->paginate(20);
        //return auth()->user()->id;
        return view('admin.modules.location.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($_POST['week_day'] as $i=>$item){
            Location::create(
                [
                    'week_day' => $item,
                    'title' =>$_POST['title'][$i],
                    'start_from' =>$_POST['start_from'][$i],
                    'end_at' =>$_POST['end_at'][$i],
                    'host_id' => auth()->user()->id,
                ]
            );
        }
        return redirect()->back()->with('message','Service Location created');
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
        //
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
        //dd($request->all());
        //return $request->all();
        Location::find($id)->fill($request->all())->save();
        return redirect()->back()->with('message','Service Location Updated..');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
