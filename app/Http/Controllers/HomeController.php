<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $viewData = $this->loadViewData();

      return view('welcome', $viewData);
    }

    public function check()
    {
        if (session('userName'))
        {
            return redirect('/dashboard');
        }else{
            return redirect('/signin');
        }
    }
}
