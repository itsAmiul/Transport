<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver - Dashboard Page'];
            return view('Driver.Dashboard', $data);
        }
    }

    public function reservation(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver - Reservation Page'];
            return view('Driver.Reservation', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }




    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver - Profile Page'];
            return view('Driver.Profile', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }

    public function settings(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver - Settings Page'];
            return view('Driver.Settings', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }
}
