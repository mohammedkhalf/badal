<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('properties/map', function (){
//    dd("oopopo");
//});
Route::group(['middleware' => ['web', 'core']], function () {

    Route::get('properties/map', 'App\Http\Controllers\CustomController@dynamicMap');
});
