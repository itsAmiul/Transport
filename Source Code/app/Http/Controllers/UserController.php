<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Passenger;
use App\Models\User;
use App\Notifications\NewLogin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\NewReservation;

class UserController extends Controller
{

    public function login (Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = ['pageTitle' => 'Login Page'];
            return view('Authenticate.Login', $data);
        }
        else if ($request->isMethod('POST')) {

            $incomingDATA =  $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            try {
                $loginAttempt = auth()->attempt(['email' => $incomingDATA['email'], 'password' => $incomingDATA['password']]);
                if ($loginAttempt) {
                    $request->session()->regenerate();

                    $user = auth()->user();
                    $ip = $request->ip();
                    $user->notify(new NewLogin($ip));

                    if ($user['type'] === 'passenger') {return redirect('/passenger/profile')->with('success', 'Login Successfully !!');}
                    else if ($user['type'] === 'driver') {return redirect('/driver/dashboard')->with('success', 'Login Successfully ');}
                    else {return redirect('/admin');}

                } else {
                    return redirect('/login')->with('error', 'Invalid Information');
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

            /* Data Validating and Storing */
            $incomingDATA = $request->validate([
                'name' => 'required',
                'email' => ['required', Rule::unique('users', 'email')],
                'phone' => 'required',
                'password' => 'required',
                'picture' => 'required',
                'address' => 'required'
            ]);

            try {
                $this->handleNewUser($request, $incomingDATA, 'passenger');

                /* Saving Additional Data In Passengers Table */
                $incomingDATA['user_id'] = auth()->id();
                Passenger::create($incomingDATA);

                return redirect('/passenger/profile')->with('success', 'Your Account Was Created Successfully, Are You Ready To Make You First Reservation !!');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }

    public function driverRegistration(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [
                'pageTitle' => 'Driver Registration Page',
                'city' => ['Casablanca','Rabat','Fes','Marrakech','Agadir','Tangier','Meknes','Oujda','Kenitra','Tetouan','Safi','El Jadida','Nador','Beni Mellal','Khouribga']
            ];
            return view('Authenticate.Driver', $data);
        }
        else if ($request->isMethod('POST')) {

            /* Data Validating and Storing */
            $incomingDATA = $request->validate([
                'name' => 'required',
                'email' => ['required', Rule::unique('users', 'email')],
                'phone' => 'required',
                'password' => 'required',
                'picture' => 'required',
                'location' => 'required',
                'address' => 'required',
                'car_model' => 'required',
                'car_number' => 'required',
                'description' => 'required',
                'payment_type' => 'required',
            ]);

            try {
                $this->handleNewUser($request, $incomingDATA, 'driver');

                /* Saving Additional Data In Passengers Table */
                $incomingDATA['user_id'] = auth()->id();
                Driver::create($incomingDATA);

                return redirect('/driver/dashboard')->with('success', 'Your Account Was Created Successfully, Are You Ready To Start Making Money !!');

            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }

    public function handleNewUser($request, $incomingDATA, $role): void
    {
        /* Setup Additional Information */
        $incomingDATA['type'] = $role;
        $incomingDATA['username'] = str_replace(' ', '-', $incomingDATA['name']) . "-" . time();

        /* Handling Users Picture */
        if ($request->hasFile("picture")) {
            $file = $request->file("picture");
            $newNAME = "img-" . time() . "." . $file->extension();
            $file->move('uploads/users', $newNAME);
            $incomingDATA['picture'] = $newNAME;
        }

        /* Register The New User And Log Him In */
        $user = User::create($incomingDATA);
        auth()->login($user);
    }

    public function logout(Request $request)
    {
        try {
            auth()->logout();
            $request->session()->invalidate();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
