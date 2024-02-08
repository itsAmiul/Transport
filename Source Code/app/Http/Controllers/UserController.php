<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login (Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Login Page'];
            return view('Authenticate.Login', $data);
        }
    }

    public function chooseRegisterType()
    {
        $data = ['pageTitle' => 'Choose Registration Type'];
        return view('Authenticate.Type', $data);
    }

    public function passengerRegistration(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Passenger Registration Page'];
            return view('Authenticate.Passenger', $data);
        }
    }

    public function driverRegistration(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver Registration Page'];
            return view('Authenticate.Driver', $data);
        }
    }
}
