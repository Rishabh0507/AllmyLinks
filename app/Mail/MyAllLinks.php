<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyAllLinks extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $expiryDate = \Carbon\Carbon::now()->addDays(7);
        $email = $request->email;
        $token = $email."|".$expiryDate;
        $encryptMail = base64_encode($token);
        $verifyUrl = "http://localhost:8000/verify/email/".$encryptMail;
        return $this->view('verify_email', ['url' => $verifyUrl])->to($request->email);
    }
}
