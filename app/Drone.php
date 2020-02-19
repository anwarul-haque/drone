<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drone extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
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

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
