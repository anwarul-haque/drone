<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drone;
use App\Pilot;
use App\User;
use App\FlightPlan;
use Auth;

class AdminController extends Controller
{
    //

    public $successStatus = 200;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drone()
    {
        $drones  = Drone::with('user')->get();
        return response()->json(['drones'=>$drones], $this->successStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function flightPlan()
    {
    	
    	$flightPlans  = FlightPlan::get();
        return response()->json(['flightPlans'=>$flightPlans], $this->successStatus);
    }

    public function pilot()
    {
        $pilots = User::where('role',2)->get();
        return response()->json(['pilot'=>$pilot], $this->successStatus);
    }

    public function operator()
    {
        $operators = User::where('role',1)->get();
        return response()->json(['operators'=>$operators], $this->successStatus);
    }
}
