<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Driver extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'phone',
        'location',
        'status',
        'car_number',
        'car_model',
        'description',
        'payment_type'
    ];
}
