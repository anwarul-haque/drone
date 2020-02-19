<?php

namespace App\Http\Controllers;

use App\Pilot;
use Illuminate\Http\Request;
use App\Drone;
Use App\User;
use Auth;
class PilotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
   
        $pilots = Pilot::select('pilot_id')->where('operator_id',Auth::user()->id)->get()->toArray();
       
        $pilots = User::where('role',2)->whereIn('id',$pilots)->paginate(5);
        return view('pilot.index')->with('pilots',$pilots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pilots = User::where('role',2)->get();
        
        return view('pilot.create')->with('pilots',$pilots);
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
        $request->merge(['operator_id' => Auth::user()->id]);
        Pilot::create($request->all());
        return redirect()->route('pilot.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function show(Pilot $pilot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function edit(Pilot $pilot)
    {
        //
        $drone = Drone::find($id);
        return view('pilot.edit')->with('drone',$drone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pilot $pilot)
    {
        //
        $drone = Drone::find($id);
      
        $drone->fill($request->all())->save();

        return redirect()->route('pilot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pilot $pilot)
    {
        //
        Pilot::destroy($id);
        return redirect()->route('pilot.index');
    }
}
