<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{

    public function generatePDF($id)
    {
        $passenger = DB::table('reservations')
            ->where('reservations.id', '=', $id)
            ->join('passengers', 'reservations.passenger_user_id', '=', 'passengers.id')
            ->join('users', 'passengers.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.picture', 'passengers.phone')
            ->get();

        $driver = DB::table('reservations')
            ->where('reservations.id', '=', $id)
            ->join('drivers', 'reservations.driver_user_id', '=', 'drivers.id')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select('drivers.location', 'drivers.phone', 'drivers.car_number', 'drivers.payment_type', 'users.name', 'users.email', 'users.picture')
            ->get();

        $route = DB::table('reservations')
            ->where('reservations.id', '=', $id)
            ->join('destinations', 'reservations.destination_remember_key', '=', 'destinations.remember_key')
            ->select('reservations.id', 'destinations.departure', 'destinations.destination', 'destinations.estimated_time', 'destinations.price', 'reservations.date')
            ->get();

        $invoice = DB::table('reservations')
            ->where('reservations.id', '=', $id)
            ->join('invoices', 'reservations.id', '=', 'invoices.reservation_id')
            ->select('invoices.code')
            ->get();


        $data = [
            'pageTitle' => 'Reservation Ticket',
            'passengerData' => $passenger[0],
            'driverData' => $driver[0],
            'routeData' => $route[0],
            'invoiceData' => $invoice[0]
        ];

        $pdf = PDF::loadView('Pdf.ticket', $data);
        $fileName = "ticket-" . time();$pdf->download("$fileName.pdf");
        return $pdf->download("$fileName.pdf");
    }
}
