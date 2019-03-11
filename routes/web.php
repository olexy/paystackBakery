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

Route::get('/add', [
    'uses' => 'PagesController@add'
]);

// processing form to add recipient
Route::post('/store/recipent', [
    'uses' => 'TransfersController@store'
]);

Route::get('/validate', [
    'uses' => 'PagesController@check'
]);

// processing form to validate account number
Route::post('/validate/account', [
    'uses' => 'TransfersController@checkAccount'
]);

Route::get('/transfer', [
    'uses' => 'PagesController@transfer'
]);

