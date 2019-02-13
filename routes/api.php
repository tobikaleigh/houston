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

/* Devices */
Route::resource('devices', 'DeviceController');

/* Settings */
Route::get('config/settings', 'SettingController@index');
Route::put('config/settings', 'SettingController@update');

/* Landingpage */
Route::get('/', function() {
  return response()->json(['msg' => 'Welcome to Houston Control Center!']);
});