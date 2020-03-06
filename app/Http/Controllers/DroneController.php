<?php

namespace App\Http\Controllers;

use App\Drone;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $drones  = Drone::where('user_id',Auth::user()->id)->paginate(5);

        return view('drone.index')->with('drones',$drones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drone.create');
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
    //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'model_no' => 'required',
            'size' => 'required',
            'type' => 'required',
            'is_npnt' => 'required',
        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        $drone = Drone::create($request->all());
        if ($request->hasFile('dImage')) {
            $url = str_replace('public/', '',$request->dImage->store('public/image'));
            $drone->image()->create(['url'=>$url,'type'=>'image']);
        }

        return redirect()->route('drone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function show(Drone $drone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd($id);
        $drone = Drone::find($id);
        return view('drone.edit')->with('drone',$drone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $drone = Drone::find($id);
      
        $drone->fill($request->all())->save();

        return redirect()->route('drone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drone  $drone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Drone::destroy($id);

        return redirect()->route('drone.index');
    }
}
