<?php

namespace App\Controllers;

class HomepageController extends BaseController
{
    public function index()
    {
        return view('homepage/home');
    }

    public function info()
    {
        return view('homepage/info');
    }

    public function contact()
    {
        return view('homepage/contact');
    }
}
