<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pilot;
use Auth;
class PilotController extends Controller
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
       $pilots = Pilot::select('pilot_id')->where('operator_id',Auth::user()->id)->get()->toArray();
       $pilots = User::where('role',2)->whereIn('id',$pilots)->get();
       return response()->json(['pilots'=>$pilots], $this->successStatus);
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
        
        return response()->json(['pilots'=>$pilots], $this->successStatus);
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
        $pilot = Pilot::create($request->all());
       return response()->json(['pilot'=>$pilot], $this->successStatus);
   }

       /**
     * Display the specified resource.
     *
     * @param  \App\Pilot  $drone
     * @return \Illuminate\Http\Response
     */
    public function show(Pilot $pilot)
    {
        return response()->json(['pilot'=>$pilot], $this->successStatus);
    }


   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Drone  $drone
    * @return \Illuminate\Http\Response
    */
   public function destroy(Pilot $pilot)
   {
        $pilot = $pilot->delete();
        return response()->json(['pilot'=>$pilot], $this->successStatus);
   }
}
