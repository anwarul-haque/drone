<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drone;
use Auth;
use Illuminate\Support\Facades\Validator;

class DroneController extends Controller
{
    //
    public $successStatus = 200;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $drones  = Drone::where('user_id',$request->user()->id)->get();
        return response()->json(['drones'=>$drones], $this->successStatus);
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
        $request->merge(['user_id' =>$request->user()->id]);
        $request->validate([
            'name' => 'required',
            'model_no' => 'required',
            'size' => 'required',
            'type' => 'required',
            'is_npnt' => 'required',
            'user_id' => 'required',
        ]);

        $drone = Drone::create($request->all());
        return response()->json(['drone'=>$drone], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function show(Drone $drone)
    {
        return response()->json(['drone'=>$drone], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drone $drone)
    {
        
        $drone->fill($request->all())->save();
        return response()->json(['drone'=>$drone], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drone $drone)
    {
         $drone = $drone->delete();
         return response()->json(['drone'=>$drone], $this->successStatus);
    }
}
