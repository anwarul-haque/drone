<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\FlightPlan;

class FlightPlanController extends Controller
{

    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flightPlans  = FlightPlan::where('user_id',Auth::user()->id)->get();
        return response()->json(['flightPlans'=>$flightPlans], $this->successStatus);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->merge(['user_id' => Auth::user()->id]);
        $request->validate([
            'address' => 'required',
            'zip_code' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'height' => 'required',
            'purpose' => 'required',
            'user_id' => 'required',
            'drone_id' => 'required',
        ]);
        if(Auth::user()->role == 1)
        {
            $request->validate([
                'pilot_id' => 'required',
            ]);
        }
        if(Auth::user()->role == 2){
            $request->merge(['pilot_id' => Auth::user()->id]);
        }

        $flightPlan = FlightPlan::create($request->all());

        return response()->json(['flightPlan'=>$flightPlan], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FlightPlan $flightPlan)
    {
        //
        return response()->json(['flightPlan'=>$flightPlan], $this->successStatus);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightPlan $flightPlan)
    {
        //
        $flightPlan->fill($request->all())->save();
        return response()->json(['flightPlan'=>$flightPlan], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightPlan $flightPlan)
    {
        //
        $flightPlan = $flightPlan->delete();
        return response()->json(['flightPlan'=>$flightPlan], $this->successStatus);
    }
}
