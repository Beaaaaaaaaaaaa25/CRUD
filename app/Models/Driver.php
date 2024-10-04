<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

    use HasFactory;

    protected $table = 'Drivers';

    protected $fillable = [

        'name',
        'license_number',
        'contact_number',
        'email',
        'address',
        'certifications',
        'license_expiry_date',
        'assigned_vehicle',
        'status',
        
    ];
}
