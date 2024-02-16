<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class WebController extends Controller
{
    public function homePage()
    {
        $data = ['pageTitle' => 'Home Page'];
        return view('Home', $data);
    }

    public function drivers(Request $request)
    {
        $drivers = DB::table('drivers')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select( 'users.id', 'users.name', 'users.email', 'users.picture', 'drivers.phone', 'drivers.location', 'drivers.car_model', 'drivers.status', 'drivers.payment_type')
            ->get();

        if ($request->isMethod('POST')) {

            $incomingDATA = $request->all();
            $query = DB::table('drivers')
                ->join('users', 'drivers.user_id', '=', 'users.id')
                ->select( 'users.id', 'users.name', 'users.email', 'users.picture', 'drivers.phone', 'drivers.location', 'drivers.car_model', 'drivers.status', 'drivers.payment_type')
                ->where('users.name', 'LIKE', '%'.$incomingDATA['search'].'%');

            if ($request->filled('departure') || $request->filled('destination') || $request->filled('price') ) {
                $query->join('trajects', 'trajects.driver_id', '=', 'drivers.id')
                    ->where('trajects.departure', 'LIKE', '%'.$incomingDATA['departure'].'%')
                    ->where('trajects.destination', 'LIKE', '%'.$incomingDATA['destination'].'%')
                    ->where('trajects.price', 'LIKE', '%'.$incomingDATA['price'].'%');
            }
            $drivers = $query->get();
        }

        $data = [
            'pageTitle' => 'Drivers Page',
            'cities' => ['Casablanca','Rabat','Fes','Marrakech','Agadir','Tangier','Meknes','Oujda','Kenitra','Tetouan','Safi','El Jadida','Nador','Beni Mellal','Khouribga'],
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
