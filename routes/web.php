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
// CalendarController
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::get('/create/calendar', 'CalendarController@create')->name('create-calendar');
Route::post('/store/calendar', 'CalendarController@store')->name('store-calendar');
Route::get('/show/calendar', 'CalendarController@show')->name('show-calendar');
Route::get('/edit/calendar/{id}', 'CalendarController@edit')->name('edit-calendar');
Route::post('/update/calendar', 'CalendarController@update')->name('update-calendar');
Route::get('/delete/calendar', 'CalendarController@destroy')->name('delete-calendar');



// Students View
Route::get('/student/clients', 'StudentController@index')->name('student-clients');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit/profile/{id}', 'ProfileController@edit')->name('edit-profile');
