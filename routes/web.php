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
Route::get('/product/filtro/{id}', 'ProductsController@filtro');
/* Route::get('/product', 'ProductsController@index'); */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/user', 'UsersController');
Route::resource('/product','ProductsController');

Route::resource('/ubication', 'UbicationsController');
Route::post('/login', array('uses' => 'UsersController@doLogin'));
Route::get('/login', array('uses' => 'UsersController@showLogin'));
Route::get('/home_vendedor','UsersController@homeVendedor');
Route::get('/agregar/{id}', 'UsersController@addProduct')->name('addProduct');

//Rutas de aprobar y bloquear usuarios y productos
Route::post('/user/{id}/aprobar', 'UsersController@aprobar');
Route::post('/user/{id}/bloquear', 'UsersController@bloquear');
Route::post('/user/{id}/hacer-admin', 'UsersController@hacerAdmin');
Route::post('/user/{id}/quitar-admin', 'UsersController@quitarAdmin');

Route::post('/product/{id}/aprobar', 'ProductsController@aprobar');
Route::post('/product/{id}/bloquear', 'ProductsController@bloquear');


// Rutas paypal
Route::get('/donate', ['as'=>'donate','uses'=>'PaymentController@donate']);
Route::post('getCheckout', ['as'=>'getCheckout','uses'=>'PaymentController@getCheckout']);
Route::get('getDone', ['as'=>'getDone','uses'=>'PaymentController@getDone']);
Route::get('getCancel', ['as'=>'getCancel','uses'=>'PaymentController@getCancel']);
 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


