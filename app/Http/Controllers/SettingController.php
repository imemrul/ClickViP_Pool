<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Psy\Command\ClearCommand;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }

    public function index(Request $request)
    {
        $setting = Setting::first();
        // dd($setting);
        return view('admin.modules.setting.edit',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.setting.store');
    }

    public function edit($id = null)
    {
        $setting = Setting::first();
        // dd($setting);
        return view('admin.modules.setting.edit',compact('setting'));
    }
    public function show($id = null){
        $setting = Setting::first();
        // dd($setting);
        return view('admin.modules.setting.edit',compact('setting'));
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
        Setting::find($id)->fill($request->all())->save();

        return redirect('module/setting/stor')->with('message','Seting updated..');

    }
}

