<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/calendar/lists', 'CalendarController@lists')->name('calendar.lists')->middleware('auth');
Route::post('/calendar/search', 'CalendarController@search')->name('calendar.search')->middleware('auth');

Route::resource('calendar', 'CalendarController')->middleware('auth');
