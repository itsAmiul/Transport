<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Reservation;
use App\Models\Traject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function dashboard(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userDATA = User::where('id', auth()->id())->get();
            $userPROFILE = User::where('id', auth()->user()->getAuthIdentifier())->select('users.picture', 'users.name')->get();

            $id = DB::table('users')
                ->join('drivers', 'drivers.user_id', '=', 'users.id')
                ->where('users.id', '=', auth()->id())
                ->select('drivers.id')
                ->get();

            $reservationCOUNT = Reservation::where('driver_user_id', '=', $id[0]->id)->count();

            $userSTATUS = Driver::where('user_id', '=', auth()->id())->select('status')->get();

            $data = [
                'pageTitle' => 'Driver - Dashboard Page',
                'user' => $userDATA,
                'reservations' => $reservationCOUNT,
                'status' => $userSTATUS,
                'userPROFILE' => $userPROFILE
            ];
            return view('Driver.Dashboard', $data);
        }
    }

    public function reservation(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userPROFILE = User::where('id', auth()->user()->getAuthIdentifier())->select('users.picture', 'users.name')->get();

            $userReservationDATA = DB::table('reservations')
                ->join('destinations', 'reservations.destination_remember_key', '=', 'destinations.remember_key')
                ->join('drivers', 'reservations.driver_user_id', '=', 'drivers.id')
                ->where('drivers.user_id', '=', auth()->id())
                ->join('passengers', 'reservations.passenger_user_id', '=', 'passengers.id')
                ->join('users', 'passengers.user_id', '=', 'users.id')
                ->select('reservations.*', 'destinations.destination', 'destinations.departure', 'passengers.phone', 'users.name', 'users.picture')
                ->whereNull('reservations.deleted_at')
                ->latest()
                ->paginate(3);

            $data = [
                'pageTitle' => 'Driver - Reservation Page',
                'reservationDATA' => $userReservationDATA,
                'userPROFILE' => $userPROFILE
            ];
            return view('Driver.Reservation', $data);
        }
        else if ($request->isMethod('POST')) {

        }
    }


    public function routes(Request $request)
    {
        $driverId = DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->where('users.id', '=', auth()->id())
            ->select('drivers.id')
            ->get();

        if ($request->isMethod('GET')) {

            $userPROFILE = User::where('id', auth()->user()->getAuthIdentifier())->select('users.picture', 'users.name')->get();
            $routes = Traject::where('driver_id', $driverId[0]->id)->paginate(5);

            $data = [
                'pageTitle' => 'Routes',
                'userPROFILE' => $userPROFILE,
                'cities' => ['Casablanca','Rabat','Fes','Marrakech','Agadir','Tangier','Meknes','Oujda','Kenitra','Tetouan','Safi','El Jadida','Nador','Beni Mellal','Khouribga'],
                'routes' => $routes
            ];
            return view('Driver.Traject', $data);
        }
        else if ($request->isMethod('POST')) {

            $incomingDATA = $request->validate([
                'departure' => 'required',
                'destination' => 'required',
                'estimated_time' => 'required',
                'price' => 'required'
            ]);



            $incomingDATA['driver_id'] = $driverId[0]->id;

            Traject::create($incomingDATA);
            return back();
        }
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userPROFILE = User::where('id', auth()->user()->getAuthIdentifier())->select('users.picture', 'users.name')->get();

            $userDATA = DB::table('users')
                ->join('drivers', 'users.id', '=', 'drivers.user_id')
                ->select()
                ->where('users.id', '=', auth()->id())
                ->get();

            $data = [
                'pageTitle' => 'Driver - Profile Page',
                'user' => $userDATA,
                'userPROFILE' => $userPROFILE,
                'city' => ['Casablanca','Rabat','Fes','Marrakech','Agadir','Tangier','Meknes','Oujda','Kenitra','Tetouan','Safi','El Jadida','Nador','Beni Mellal','Khouribga']
            ];
            return view('Driver.Profile', $data);
        }
        else if ($request->isMethod('PUT')) {

            $incomingDATA = $request->validate([
                'name' => "required",
                'email' => "required",
                'address' => "required"
            ]);

            $additionalInformation = $request->validate([
                'phone' => "required",
                'status' => "required",
                'car_number' => "required",
                'location' => "required",
                'car_model' => "required",
                'payment_type' => "required",
                'description' => "required"
            ]);

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $newName = "img-" . time() . "." . $file->extension();
                $file->move('uploads/users', $newName);
                $incomingDATA['picture'] = $newName;
            }

            User::where('id', auth()->id())->update($incomingDATA);
            Driver::where('user_id', auth()->id())->update($additionalInformation);
            return back()->with('success', 'Profile Updated Successfully !');
        }
    }

    public function settings(Request $request)
    {
        if ($request->isMethod('GET')) {

            $userPROFILE = User::where('id', auth()->user()->getAuthIdentifier())->select('users.picture', 'users.name')->get();

            $data = [
                'pageTitle' => 'Driver - Settings Page',
                'userPROFILE' => $userPROFILE
            ];
            return view('Driver.Settings', $data);
        }
        else if ($request->isMethod('PATCH')) {

            $incomingDATA = $request->validate([
                'password' => 'required|min:8|max:30'
            ]);

            $incomingDATA['password'] = password_hash($incomingDATA['password'], PASSWORD_BCRYPT);
            User::where('id', auth()->id())->update($incomingDATA);
            return back()->with('success', 'Profile Updated Successfully !');
        }
    }


    public function deleteTraject(Request $request, $id)
    {
        $traject = Traject::where('id', '=', $id);
        $traject->delete();

        return back()->with('success', 'Traject Deleted Successfully');
    }
}
