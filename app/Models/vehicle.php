<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{

    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'make',
        'model',
        'year',
        'vin',
        'registration_number',
        'capacity',
        'current_status',
        'maintenance_schedule',
        'insurance_info',

    ];

}
