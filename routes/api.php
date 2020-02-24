<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:api']], function () { 
    Route::get('user', function (Request $request) {
        return $request->user();
    });
   
    Route::apiResource('drone','Api\DroneController');
    Route::apiResource('flightPlan','Api\FlightPlanController');

    Route::post('logout','Api\AuthController@logout');
});
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
