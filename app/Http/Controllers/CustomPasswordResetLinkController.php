<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Rules\EmailCheckRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CustomPasswordResetLinkController extends Controller
{
    public function postEmail(Request $request)
    {
      $request->validate([
          'email' => ['required', new EmailCheckRule]
      ]);

      $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('vendor.notifications.email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}
