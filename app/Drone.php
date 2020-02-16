<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    //
    protected $fillable = [
        'name',
        'model_no',
        'size',
        'type',
        'is_npnt',
        'user_id',
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'drones';
}
