<?php

namespace App\Http\Controllers;


use App\Weekly_session_timing;
use Illuminate\Http\Request;


class WeeklySessionTime extends Controller
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

        $results = Weekly_session_timing::where('host_id',auth()->user()->id)->orderBy('id','desc')->paginate(20);
        //return auth()->user()->id;
        return view('admin.modules.weekly_session_time.index',compact('results'));
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
            Weekly_session_timing::create(
                [
                    'week_day' => $item,
                    'title' =>$_POST['title'][$i],
                    'start_from' =>$_POST['start_from'][$i],
                    'end_at' =>$_POST['end_at'][$i],
                    'host_id' => auth()->user()->id,
                ]
            );
        }
        return redirect()->back()->with('message','Session time created');
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
        Weekly_session_timing::find($id)->fill($request->all())->save();
        return redirect()->back()->with('message','Session updated..');

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
