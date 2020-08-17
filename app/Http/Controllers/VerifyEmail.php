<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerifyEmail extends Controller
{
    public function isEmailVerify($token)
    {
        $details = base64_decode($token);
        $res = explode("|", $details);
        $today = \Carbon\Carbon::now();
        if($today <= $res[1])
        {
            $getId = DB::table('users')->select('id')->where('email', $res[0])->get();
            $is_email_verify = User::find($getId[0]->id);
            $is_email_verify->is_email_verified = 1;
            $is_email_verify->save();

            $this->guard()->login($is_email_verify);

            return redirect()->route('welcome');
        }
        else{
            return  "<div style = 'text-align:center; padding: 25px; border:2px solid red;'><b>Unable to Redirect !! Link Expire</b></div>";
        }
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
