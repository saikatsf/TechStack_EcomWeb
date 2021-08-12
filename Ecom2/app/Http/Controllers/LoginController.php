<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function registerfunc(Request $req){

        $req->validate([
            'uNameRegister' => 'required | regex:/^[a-zA-Z\s]*$/',
            'uEmailRegister' => 'required | email |unique:users,email',
            'uPasswordRegister'=> 'required | min:8'
        ]);
        $currentuser = new user;
        
        $currentuser->name=$req->uNameRegister;
        $currentuser->email=$req->uEmailRegister;
        $currentuser->password=Hash::make($req->uPasswordRegister);
        $currentuser->save();
        
        $req->session()->put('user', $req->uNameRegister);
        $req->session()->put('userid',$currentuser->id);
        return redirect(session('loginRedirect'));
    }
    public function loginfunc(Request $req){

        $req->validate([
            'uEmailLogin' => 'required | email',
            'uPasswordLogin'=> 'required | min:8'
        ]);

        $data=user::where('email',$req->uEmailLogin)->first();
        if(empty($data)){
            return redirect(session('loginRedirect'))->with('loginmessage', 'Wrong Email or Password');
        }
        
        if(Hash::check($req->uPasswordLogin, $data->password)){
            $req->session()->put('userid', $data->id);
            $req->session()->put('user', $data->name);

            return redirect(session('loginRedirect'));
            

        }
        else{
            return redirect(session('loginRedirect'))->with('loginmessage', 'Wrong Email or Password');
        }

    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){

        $socUser = Socialite::driver('google')->user();

        $data=user::where('email',$socUser->email)->first();

        if($data && $data->provider_id != $socUser->id){
            return redirect('/')->with('loginmessage', 'An account is already registered with this email');
        }

        if(!$data){
            $currentuser = new user;
        
            $currentuser->name=$socUser->name;
            $currentuser->email=$socUser->email;
            $currentuser->provider_id=$socUser->id;

            $currentuser->save();
            session(['userid' => $currentuser->id]);
        }
        else{
            session(['userid' => $data->id]);
        }
        
        session(['user' => $socUser->name]);
        return redirect(session('loginRedirect'));

    }


    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(){
        $socUser = Socialite::driver('facebook')->user();

        $data=user::where('email',$socUser->email)->first();

        if($data && $data->provider_id != $socUser->id){
            return redirect('/')->with('loginmessage', 'An account is already registered with this email');
        }

        if(!$data){
            $currentuser = new user;
        
            $currentuser->name=$socUser->name;
            $currentuser->email=$socUser->email;
            $currentuser->provider_id=$socUser->id;

            $currentuser->save();

            session(['userid' => $currentuser->id]);
        }
        else{
            session(['userid' => $data->id]);
        }

        session(['user' => $socUser->name]);

        return redirect(session('loginRedirect'));
    }
}
