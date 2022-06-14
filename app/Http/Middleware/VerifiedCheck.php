<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifiedCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();

        if(!$user->email_verified_at){
            return redirect('/user/profile')->with('verify_msg','please verify your email!');
        }

        if(!$user->msgraph_login){
            return redirect('/user/profile')->with('verify_msg', 'please login your microsoft account!');
        }

        return $next($request);
    }
}
