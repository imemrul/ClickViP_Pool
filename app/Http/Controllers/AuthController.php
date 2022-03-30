<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use App\User;
use App\Roll;
use App\UserVerify;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Mail; 


class AuthController extends Controller{


    public function __construct(){
        $this->middleware('RedirectIfAuthenticate',['except'=>['logout','profile_update','login_id_update','password_update']]);
    }
    
    public function index(){
        return view('admin.login');
    }
    public function registration(Request $request){
        $input = $request->all();
        $input['roll_id'] = 3;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $token = Str::random(64);
        Auth::loginUsingId($user->id, $remember = true);
        UserVerify::create([
            'user_id' => $user->id, 
            'token' => $token
            ]);
            Mail::send('email.VerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
            });
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        // return redirect()->back()->with('success_message','Registration completed..');
    }
    public function login(Request $r){
        //return $r->all();
        if(Auth::attempt(['email'=>$r->email,'password'=>$r->password])){

            return redirect('dashboard');
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
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
            $verifyUser->user->is_email_verified = 1;
            $verifyUser->user->save();
            $message = "Your e-mail is verified. You can now login.";
        } else {
            $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function profile_update(Request $request, $user_id){
        //return $request->all();
        $user = User::find($user_id);
        $user->fill([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo'=> $request->hasFile('photo') ? upload_image($request->file('photo'),'user_'.$user_id.'_') : $user->photo,
        ])->save();
        return redirect()->back()->with('message','Information updated...');

    }
    public function login_id_update(Request $request, $user_id){
        $user = User::find($user_id);
        if(auth()->user()->email != $request->email){
            if(!User::where('email',$request->email)->first()){
                $user->fill([
                    'email'=>$request->email
                ])->save();
            }else{
                return redirect()->back()->with('message','This Login ID already taken, Try another...');
            }
        }
        return redirect()->back()->with('message','Login ID updated...');
    }
    public function password_update(Request $request, $user_id){
        //return $request->all();
        User::find($user_id)->fill([
            'password'=>\Illuminate\Support\Facades\Hash::make($request->password),
        ])->save();

        return redirect()->back()->with('message','Password updated...');
    }


    
}
