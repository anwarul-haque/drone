<?php

namespace App\Http\Controllers;

use App\FlightPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Drone;
use App\Pilot;
use App\User;
use Auth;

class FlightPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flightPlans  = FlightPlan::where('user_id',Auth::user()->id)->paginate(5);

        return view('flight_plan.index')->with('flightPlans',$flightPlans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $pilots_id = Pilot::where('operator_id',Auth::user()->id)->get()->pluck('pilot_id')->toArray();
        // dd($pilots_id);
        $pilots = User::where('role',2)->whereIn('id',$pilots_id)->get();
        $drones = Drone::where('user_id',Auth::user()->id)->get();
       
        return view('flight_plan.create',compact('pilots','drones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'address' => 'required',
            'zip_code' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'height' => 'required',
            'purpose' => 'required',
            // 'pilot_id' => 'required',
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

        $request->merge(['user_id' => Auth::user()->id]);
        FlightPlan::create($request->all());

        return redirect()->route('flightPlan.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightPlan  $flightPlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd('kjljl');
        $request->merge(['user_id' => Auth::user()->id]);

        $drone = FlightPlan::create($request->all());

        return redirect()->route('flightPlan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightPlan  $flightPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        $flightPlan = FlightPlan::find($id);
        return view('flight_plan.edit')->with('flightPlan',$flightPlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightPlan  $flightPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $flightPlan = FlightPlan::find($id);
        // dd($id);
        $flightPlan->fill($request->all())->save();

        return redirect()->route('flightPlan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightPlan  $flightPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $flightPlan = FlightPlan::find($id);
        $flightPlan->delete();

        return redirect()->route('flightPlan.index');
    }
}
