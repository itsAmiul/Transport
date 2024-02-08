<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class WebController extends Controller
{
    public function homePage()
    {
        $data = ['pageTitle' => 'Home Page'];
        return view('Home', $data);
    }
}
