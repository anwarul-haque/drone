<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with('user',$user);
    }
 
    public function show($id)
    {
        $user = User::with('image')->find($id);
        return view('user.index')->with('user',$user);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $drone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $user = User::with('image')->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        
        if ($request->hasFile('image')) {
            $url = str_replace('public/', '',$request->image->store('public/image'));
            $user->image()->create(['url'=>$url,'type'=>'image']);
        }
        $user->save();
        return back();
    }

    public function hello($id){
        $user = User::with('image')->find($id);
        return view('user.index')->with('user',$user);
    }

}
