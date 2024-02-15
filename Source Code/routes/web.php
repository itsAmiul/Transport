<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Home Page */
Route::get('/', [WebController::class, 'homePage']);

/* Authentication  Routes */
Route::middleware('guest')->group(function () {
    /* Login */
    Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');

    /* Registration */
    Route::get('/RegistrationType', [UserController::class, 'chooseRegisterType']);
    Route::match(['get', 'post'], '/passengerRegistration', [UserController::class, 'passengerRegistration']);
    Route::match(['get', 'post'], '/driverRegistration', [UserController::class, 'driverRegistration']);
});

/* Log out */
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->middleware('auth');

/* Driver Routes */
Route::middleware(['auth', 'userAccess:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverController::class, 'dashboard']);
    Route::match(['get', 'post'], '/driver/reservation', [DriverController::class, 'reservation']);
    Route::match(['get', 'post'], '/driver/traject', [DriverController::class, 'routes']);
    Route::match(['get', 'put'], '/driver/profile', [DriverController::class, 'profile']);
    Route::match(['get', 'patch'], '/driver/settings', [DriverController::class, 'settings']);
});

/* Passenger Routes */
Route::middleware(['auth', 'userAccess:passenger'])->group(function () {
    Route::match(['get', 'put'],'/passenger/profile', [PassengerController::class, 'profile']);
    Route::match(['get', 'post'],'/passenger/reservation', [PassengerController::class, 'reservation']);
});

/* Reservation Routes */
Route::middleware(['auth', 'userAccess:driver'])->group(function () {
    Route::match(['get', 'put'], '/reservation/confirm/{id}', [ReservationController::class, 'confirmation']);
    Route::match(['get', 'put'], '/reservation/cancel/{id}', [ReservationController::class, 'cancel']);
    Route::match(['get', 'delete'], '/reservation/delete/{id}', [ReservationController::class, 'delete']);
});

/* Website Routes */
Route::match(['GET', 'POST'],'/drivers', [WebController::class, 'drivers']);
Route::match(['GET', 'POST'],'/drivers/profile/{driverId}', [WebController::class, 'driverProfile']);


Route::middleware(['auth', 'userAccess:passenger'])->group(function () {
    Route::match(['get', 'post'], '/reservation/create/{driverId}', [ReservationController::class, 'makeReservation']);
    Route::match(['get', 'delete'], '/reservation/passenger/delete/{id}', [ReservationController::class, 'passengerDelete']);
});
