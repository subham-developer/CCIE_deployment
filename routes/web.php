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


// Backend Links starts Here
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Dashboard', 'HomeController@Dashboard')->name('Dashboard');
Route::get('/view/clients', 'ClientController@index')->name('view-clients');
Route::get('/create/clients', 'ClientController@create')->name('create-clients');
Route::post('/store/clients', 'ClientController@store')->name('store-clients');

