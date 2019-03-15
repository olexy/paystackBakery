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

Route::get('/add', 'PagesController@add');

// processing form to add recipient
Route::post('/store/recipent', [
    'uses' => 'TransfersController@store'
]);

Route::get('/validate', 'PagesController@check');

// processing form to validate account number
Route::post('/validate/account', [
    'uses' => 'TransfersController@checkAccount'
]);

Route::get('/transfer', 'PagesController@transfer');

// processing form to transfer
Route::post('/otp', [
    'uses' => 'TransfersController@transfer'
]);


Route::get('/otp', 'PagesController@otp');

// processing form for otp
Route::post('/transfer/auth', 'TransfersController@otp');

