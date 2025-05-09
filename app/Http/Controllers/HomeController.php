<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('backend.master');
    }
    public function homePage()
    {
        return view('backend.pages.homePage');
    }
  

    
}
