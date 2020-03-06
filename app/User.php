<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Image;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class,'imageable')->orderBy('created_at', 'desc');
    }

    /**
     * Get the drone for the user post.
     */
    public function drones()
    {
        return $this->hasMany('App\Drone');
    }

    /**
     * Get the flight_Plans for the user post.
     */
    public function flight_plans()
    {
        return $this->hasMany('App\FlightPlan');
    }

    
    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }

}
