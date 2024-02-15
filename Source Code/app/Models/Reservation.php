<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'passenger_user_id',
        'driver_user_id',
        'destination_remember_key',
        'date'
    ];
}
