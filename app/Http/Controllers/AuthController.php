<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use App\User;
use App\Roll;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller{


    public function __construct(){
        $this->middleware('RedirectIfAuthenticate',['except'=>'logout']);
    }
    
    public function index(){
        return view('admin.login');
    }
    public function registration(Request $request){
        $input = $request->all();
        $input['roll_id'] = 3;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        Auth::loginUsingId($user->id, $remember = true);
        return redirect()->back()->with('success_message','Registration completed..');
    }
    public function login(Request $r){
        //return $r->all();
        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password])){

            return redirect('admin');
        }else{
            return redirect()->back()->with('error_message',$r->email);
        }
    }
    public function ajax_login(Request $r){

        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password])){
            return 1;
        }else{
            return 0;
        }
    }
    public function check_email_availibility(){
        if(User::where('email',request()->email)->first()){
            return 0;
        }else{
            return 1;
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }


    
}
