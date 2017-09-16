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

/*
 * Main page
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

/*
 * Routes which need authentication
 */
Route::group(['middleware' => 'auth'], function (){

    /*
     * Dashboard
     */
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'clubs'], function (){
        Route::get('/menu', 'ClubController@menu')->name('clubs-menu');
    });

    Route::group(['prefix' => 'contracts'], function (){
        Route::get('/menu', 'ContractController@menu')->name('contracts-menu');
        Route::get('/management/menu', 'ContractController@managementMenu')
            ->name('contracts-management-menu');
    });

    Route::group(['prefix' => 'users'], function (){

        Route::get('/{user}/contracts/created', 'UserController@createdContracts')
            ->name('user-contracts-created');

        Route::get('/{user}/contracts/binding', 'UserController@bindingContract')
            ->name('user-contracts-binding');
    });

});
