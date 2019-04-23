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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/user', 'UsersController');
Route::post('/login', array('uses' => 'UsersController@doLogin'));
Route::get('/login', array('uses' => 'UsersController@showLogin'));
Route::get('/home_vendedor','UsersController@homeVendedor');