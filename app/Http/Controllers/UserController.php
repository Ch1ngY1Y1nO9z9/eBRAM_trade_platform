<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($msg)
    {
        return view('view.profile.')->with('msg', $msg);
    }
}
