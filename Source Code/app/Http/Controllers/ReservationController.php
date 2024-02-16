<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\Reservation;
use App\Models\Traject;
use App\Models\User;
use App\Notifications\NewReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    public function confirmation($id)
    {
        $newStatus = ['status' => 'Confirmed'];
        try {
            Reservation::where('id', '=', $id)
                ->where('driver_user_id', '=', auth()->id())
                ->update($newStatus);

            $newINVOICE = [
                'code' => mt_rand(1111111111, 9999999999),
                'reservation_id' => $id
            ];

            Invoice::create($newINVOICE);

            return back()->with('success', 'Reservation Confirmed Successfully !');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function cancel($id)
    {
        $newStatus = ['status' => 'Canceled'];
        try {
            Reservation::where('id', '=', $id)
                ->where('driver_user_id', '=', auth()->id())
                ->update($newStatus);

            return back()->with('success', 'Reservation Canceled Successfully !');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function done($id)
    {
        $newStatus = ['status' => 'Done'];
        try {
            Reservation::where('id', '=', $id)
                ->where('driver_user_id', '=', auth()->id())
                ->update($newStatus);

            return back()->with('success', 'Reservation Marked As DOne  Successfully !');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Reservation::where('id', '=', $id)
                ->where('driver_user_id', '=', auth()->id())
                ->delete();

            return back()->with('success', 'Reservation Deleted Successfully !');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function passengerDelete($id)
    {
        try {
            Reservation::where('id', '=', $id)
                ->where('status', '!=', 'Confirmed')
                ->delete();

            return back()->with('success', 'Reservation Deleted Successfully !');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function makeReservation(Request $request, $driverId)
    {
        if ($request->isMethod('GET')) {

            $id = DB::table('users')
                ->join('drivers', 'drivers.user_id', '=', 'users.id')
                ->where('users.id', '=', $driverId)
                ->select('drivers.id')
                ->get();

            $driverROUTES = Traject::where('driver_id', '=', $id[0]->id)
                ->select('trajects.id', 'trajects.departure', 'trajects.destination', 'estimated_time', 'trajects.price')
                ->get();

            $data = [
                'pageTitle' => 'New Reservation',
                'driverId' => $driverId,
                'driverROUTES' => $driverROUTES
            ];
            return view('Website.Reservation', $data);
        }
        else if ($request->isMethod('POST')) {
            $incomingDATA = $request->validate([
                'destination' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);
            $routeSELECTED = Traject::where('id', '=', $incomingDATA['destination'])->get();
            $passenger = DB::table('users')
                ->join('passengers', 'users.id', '=', 'passengers.user_id')
                ->select('passengers.id')
                ->get();

            $Id = DB::table('users')
                ->join('drivers', 'users.id', '=', 'drivers.user_id')
                ->where('users.id', '=', $driverId)
                ->select('drivers.id')
                ->get();

            $incomingDATA['date'] = $incomingDATA['date'] . ' ' . $incomingDATA['time'];
            $incomingDATA['departure'] = $routeSELECTED[0]->departure ;
            $incomingDATA['destination'] = $routeSELECTED[0]->destination ;
            $incomingDATA['estimated_time'] = $routeSELECTED[0]->estimated_time ;
            $incomingDATA['price'] = $routeSELECTED[0]->price ;
            $incomingDATA['remember_key'] = uniqid(mt_rand(), true) ;
            $incomingDATA['passenger_user_id'] = $passenger[0]->id;
            $incomingDATA['driver_user_id'] = $Id[0]->id;
            $incomingDATA['destination_remember_key'] = $incomingDATA['remember_key'];

            Destination::create($incomingDATA);
            Reservation::create($incomingDATA);

            $driver = DB::table('drivers')
                ->join('users', 'drivers.user_id', '=', 'users.id')
                ->where('drivers.id', '=', $incomingDATA['driver_user_id'])
                ->get();

            $user = User::find($driver[0]->id);
            $user->notify(new NewReservation());

            return redirect('/passenger/reservation')->with('success', 'reservation created successfully');
        }
    }
}
