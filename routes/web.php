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

    /*
     * Redirect authenticated user to dashboard
     */
    if (Auth::check()){
        return Redirect::route('home');
    }

    return view('main-page');

})->name('main-page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
