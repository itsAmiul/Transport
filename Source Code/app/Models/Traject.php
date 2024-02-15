<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traject extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'departure',
        'destination',
        'estimated_time',
        'price'
    ];
}
