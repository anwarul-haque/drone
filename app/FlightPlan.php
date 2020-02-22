<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightPlan extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'address',
        'zip_code',
        'start_time',
        'end_time',
        'height',
        'purpose',
        'user_id',
        'pilot_id',
        'drone_id',
       
    ];
    protected $table = 'flight_plans';
}
