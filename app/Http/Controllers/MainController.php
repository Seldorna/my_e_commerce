<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function homepage()
    {
        return view('homepage');
    }
    public function user_cart()
    {
        return view('user_cart');
    }
     public function servicepage()
    {
        return view('service');
    }
    public function aboutpage()
    {
        return view('about');
    }
}
