<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('devices/add','DevicesController@add');

Route::get('/', 'HomeController@index');



Route::resource('devices','DevicesController');
Route::get('public','DevicesController@publicDevices');
Route::get('public/{devices}','DevicesController@publicDevicesShow');

Route::resource('channels','ChannelsController');
Route::get('channels/{channels}/latest','ChannelsController@latest');
Route::get('publicchannels/{channels}','ChannelsController@publicShow');

Route::get('api/data/{channels}/latest','DataLogController@getLatest');
Route::get('api/data/{channels}','DataLogController@get');
Route::post('api/data','DataLogController@store');


Route::resource('user','UserController');
Route::patch('user/data/{user}','UserController@updateData');
Route::patch('user/password/{user}','UserController@updatePassword');


Route::patch('account/data','UserController@updatePersonalData');
Route::patch('account/password','UserController@updatePersonalPassword');
Route::get('account','UserController@account');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);