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
        else if ($request->isMethod('POST')) {

            $incomingDATA = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            try {
                $loginATTEMPT = auth()->attempt(['email' => $incomingDATA['email'], 'password', $incomingDATA['password']]);
                if ($loginATTEMPT) {
                    $request->session()->regenerate();

                    // Check Role Here ( logic )

                } else {
                    return redirect('/')->with('error', 'Information Invalid');
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
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
        else if ($request->isMethod('POST')) {
            $incommingDATA = $request->validate([
                'name' => 'required',
                'email' => ['required', Rule::unique('users', 'email')],
                'phone' => 'required',
                'password' => 'required',
                'picture' => 'required',
                'address' => 'required'
            ]);
            $incommingDATA['user_type'] = "Passenger";

        }
    }

    public function driverRegistration(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Driver Registration Page'];
            return view('Authenticate.Driver', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }
}
