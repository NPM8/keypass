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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/passwords', 'HomeController@passwords')->name('passwords');

Route::post('/home/password/add', 'HomeController@addPassword')->name('add-passwords');

// Route::get('/user', 'HomeControler@getpasswords')->name('get-password');
