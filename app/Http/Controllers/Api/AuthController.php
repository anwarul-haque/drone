<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public $successStatus = 200;

    public function register(Request $request){

        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if($request ->role == 1){
            $request->type = 'operator';
        }
        if($request->role == 2){
            $request->type = 'pilot';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        $success['token'] =  $user->createToken(config('app.name'))->accessToken; 
        $success['name'] =  $user->name;
        
        return response()->json(['success'=>$success], $this->successStatus); 
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken(config('app.name'))->accessToken; 
            return response()->json(['success' => $success], $this->successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
}
