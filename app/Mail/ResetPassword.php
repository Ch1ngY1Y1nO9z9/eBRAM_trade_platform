<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$request)
    {
        $this->token = $token;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = URL::to("/");
        
        return $this->markdown('vendor.notifications.resetPassword')->to($this->request->email)->subject('Reset Password Notification')->with(['actionText'=> 'Reset Password' ,'actionUrl'=>$url.'/reset-password/'.$this->token , 'level' => 'success' ]);
    }
}
