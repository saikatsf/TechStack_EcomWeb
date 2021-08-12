<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use App\Models\user;
use App\Models\passwordreset;

class ProfileController extends Controller
{
    public function showProfileDetails(){
        $user = user::where('id',session('userid'))->first();
        
        return view('profile/profileDetails')->with('user',$user);
    }

    public function changeName(Request $req){
        $req->validate([
            'newName' => 'required | regex:/^[a-zA-Z\s]*$/',
        ]);

        $currentuser = user::where('id',session('userid'))->first();

        $currentuser->name = $req->newName;
        $currentuser->save();

        $req->session()->put('user', $req->newName);

        return redirect('/profile');
    }
    public function changePassword(Request $req){
        $req->validate([
            'oldPass' => 'required | min:8',
            'newPass' => 'required | min:8',
            'confirmNewPass'=> 'required | min:8'
        ]);
        if ($req->newPass != $req->confirmNewPass){
            return redirect()->back()->withErrors(['confirmNewPass' => 'Passwords Dont match']);
        }
        $currentuser = user::where('id',session('userid'))->first();
        if (!Hash::check($req->oldPass,$currentuser->password)) {
            return redirect()->back()->withErrors(['oldPass' => 'Wrong Password']);
        }
        else{
            $currentuser->password=Hash::make($req->newPass);
            $currentuser->save();

            return redirect('/profile');
        }
    }

    public function forgotPassword(Request $req){
        $req->validate([
            'forgotPemail' => 'required | email',
        ]);
        
        $currentuser = user::where('email',$req->forgotPemail)->first();

        if(empty($currentuser)){
            return redirect()->back()->withErrors(['forgotPemail' => 'Email Does not Exist']);
        }
        $token = random_int(100000, 999999);

        $newReset = new passwordreset;

        $newReset->email = $req->forgotPemail;
        $newReset->token = $token;
        $newReset->created_at = Carbon::now();
        $newReset->save();

        $username = $currentuser->name;
        $useraddress = $req->forgotPemail;

        Mail::send('email.forgetPassword', ['token' => $token,'name' => $username], function($message) use($useraddress){
            $message->to($useraddress);
            $message->subject('Reset Password');
        });
        $req->session()->put('forgotPassEmail', $currentuser->email);
        return view('profile.forgotpasswordotp');

    }

    public function forgotPasswordotp(Request $req){
        $req->validate([
            'forgotPotp' => 'required | digits:6',
        ]);

        $checkotp = passwordreset::where('email',$req->forgotPemail)
                    ->orderByDesc('created_at')
                    ->first();

        if($checkotp->token != $req->forgotPotp) {
            return view('profile.forgotpasswordotp')->withErrors(['forgotPotp' => 'OTP is Incorrect']);
        }
        $otpCreationTime = Carbon::parse($checkotp->created_at);
        
        if( $otpCreationTime->diffInSeconds(Carbon::now()) > 300 ) {
            return view('profile.forgotpasswordotp')->withErrors(['forgotPotp' => 'OTP Time Limit is Expired']);
        }
        return redirect('changeforgotpassword');
    }

    public function changeForgotPass(Request $req){
        $req->validate([
            'forgotPasswordNew' => 'required | min:8',
        ]);
        $currentuser = user::where('email',session('forgotPassEmail'))->first();
        $currentuser->password=Hash::make($req->forgotPasswordNew);
        $currentuser->save();
        
        session()->pull('forgotPassEmail');
        return redirect('/');
    }

}
