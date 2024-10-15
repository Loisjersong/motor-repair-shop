<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'vehicle_id',
        'services',
        'note',
        'appointment_date',
        'status',
    ];
}
