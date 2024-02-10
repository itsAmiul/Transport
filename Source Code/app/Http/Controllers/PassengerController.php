<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Passenger - Profile Page'];
            return view('Passenger.Profile', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }

    public function reservation(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Passenger - Profile Page'];
            return view('Passenger.Reservation', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }
}
