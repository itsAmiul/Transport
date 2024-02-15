<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class WebController extends Controller
{
    public function homePage()
    {
        $data = ['pageTitle' => 'Home Page'];
        return view('Home', $data);
    }

    public function drivers()
    {
        $drivers = DB::table('drivers')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select( 'users.id', 'users.name', 'users.email', 'users.picture', 'drivers.phone', 'drivers.location', 'drivers.car_model', 'drivers.status', 'drivers.payment_type')
            ->get();

        $data = [
            'pageTitle' => 'Drivers Page',
            'drivers' => $drivers

        ];
        return view('Website.Drivers', $data);
    }

        public function driverProfile($driverId)
    {
        $driver = DB::table('drivers')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select( 'users.name', 'users.email', 'users.is_valid', 'users.picture', 'drivers.*')
            ->where('user_id', '=', $driverId)
            ->get();

        $reservationCOUNT = DB::table('drivers')
            ->where('user_id', '=', $driverId)
            ->join('reservations', 'drivers.id', '=', 'reservations.driver_user_id')
            ->count();

        $data = [
            'pageTitle' => 'Driver Profile Page',
            'driver' => $driver,
            'reservationCOUNT' => $reservationCOUNT,
            'driverId' => $driverId
        ];

        return view('Website.DriverProfile', $data);
    }

}
