<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {
    //
});*/

//Route::get('/{name?}', 'MyController@index');


Route::resource('makers', 'MakerController', ['except' => ['create', 'edit']]);
Route::resource('vehicles', 'VehicleController', ['only' => ['index']]);
Route::resource('makers.vehicles', 'MakerVehiclesController', ['except' => ['edit', 'create']]);