<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightPlan extends Model
{
    //
    protected $fillable = [
        'address',
        'zip_code',
        'start_time',
        'end_time',
        'height',
        'purpose',
        'user_id',
       
    ];
    protected $table = 'flight_plans';
}
