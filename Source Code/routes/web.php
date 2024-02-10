<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
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

/* Login */
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login')->middleware('guest');

/* Registration */
Route::get('/RegistrationType', [UserController::class, 'chooseRegisterType']);
Route::match(['get', 'post'], '/passengerRegistration', [UserController::class, 'passengerRegistration']);
Route::match(['get', 'post'], '/driverRegistration', [UserController::class, 'driverRegistration']);

/* Log out */
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->middleware('auth');


/* Driver Routes */
Route::get('/driver/dashboard', [DriverController::class, 'dashboard']);
Route::match(['get', 'post'], '/driver/reservation', [DriverController::class, 'reservation']);
Route::match(['get', 'post'], '/driver/profile', [DriverController::class, 'profile']);
Route::match(['get', 'post'], '/driver/settings', [DriverController::class, 'settings']);


/* Passenger Routes */
Route::match(['get', 'post'],'/passenger/profile', [PassengerController::class, 'profile']);
Route::match(['get', 'post'],'/passenger/reservation', [PassengerController::class, 'reservation']);

