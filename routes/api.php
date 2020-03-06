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
    Route::apiResource('home','Api\HomeController');
    Route::apiResource('drone','Api\DroneController');
    Route::apiResource('flightPlan','Api\FlightPlanController');
    Route::apiResource('pilot','Api\PilotController');
    Route::post('logout','Api\AuthController@logout');

    Route::get('/admin/drone', 'Api\AdminController@drone');
    Route::get('/admin/flightPlan', 'Api\AdminController@flightPlan');
    Route::get('/admin/pilot', 'Api\AdminController@pilot');
    Route::get('/admin/operator', 'Api\AdminController@operator');
});
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
