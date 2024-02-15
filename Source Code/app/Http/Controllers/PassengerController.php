<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userDATA = DB::table('users')
                ->join('passengers', 'users.id', '=', 'passengers.user_id')
                ->select('users.id', 'users.name', 'users.username', 'users.email', 'users.address', 'users.picture', 'users.type', 'passengers.*')
                ->where('users.id', '=', auth()->id())
                ->get();

            $data = [
                'pageTitle' => 'Passenger - Profile Page',
                'user' => $userDATA
            ];

            return view('Passenger.Profile', $data);
        }
        else if ($request->isMethod('PUT')) {

            $incomingDATA = $request->validate([
                'name' => "required",
                'email' => "required",
                'address' => "required"
            ]);

            $additionalInformation = $request->validate([
                'phone' => "required"
            ]);

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $newName = "img-" . time() . "." . $file->extension();
                $file->move('uploads/users', $newName);
                $incomingDATA['picture'] = $newName;
            }

            User::where('id', auth()->id())->update($incomingDATA);
            Passenger::where('user_id', auth()->id())->update($additionalInformation);
            return back()->with('success', 'Profile Updated Successfully !');

        }
    }

    public function reservation(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userReservationDATA = DB::table('reservations')
                ->join('destinations', 'reservations.destination_remember_key', '=', 'destinations.remember_key')
                ->join('drivers', 'reservations.driver_user_id', '=', 'drivers.id')
                ->join('users', 'drivers.user_id', '=', 'users.id')
                ->select('reservations.*', 'destinations.destination', 'destinations.departure', 'drivers.phone', 'users.name', 'users.picture')
                ->whereNull('reservations.deleted_at')
                ->latest()
                ->paginate(3);

            $data = [
                'pageTitle' => 'Passenger - Reservation Page',
                'reservationDATA' => $userReservationDATA
            ];

            return view('Passenger.Reservation', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }
}
