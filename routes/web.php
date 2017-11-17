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
        Route::get('/{club}/menu', 'ClubController@clubMenu')->name('clubs-club-menu');
        Route::get('/{club}/submenu/1', 'ClubController@clubSubMenu1')->name('clubs-club-submenu-1');
        Route::get('/{club}/submenu/2', 'ClubController@clubSubMenu2')->name('clubs-club-submenu-2');

        Route::get('/listAndSearch', 'ClubController@listAndSearch')
            ->name('clubs-list-search');

        Route::get('/{club}/show', 'ClubController@show')
            ->name('club-show');

        Route::get('/{club}/trophies/firstPlace', 'ClubController@getTrophiesForFirstPlace')
            ->name('club-trophies-first-place');

        Route::get('/{club}/trophies/secondPlace', 'ClubController@getTrophiesForSecondPlace')
            ->name('club-trophies-second-place');

        Route::get('/{club}/trophies/thirdPlace', 'ClubController@getTrophiesForThirdPlace')
            ->name('club-trophies-third-place');

        Route::get('/{club}/tournaments/open', 'ClubController@openTournaments')
            ->name('club-tournaments-open');

        Route::get('/{club}/tournaments/closed', 'ClubController@closedTournaments')
            ->name('club-tournaments-closed');

        Route::get('/create', 'ClubController@create')
            ->name('club-create');

        Route::post('/store', 'ClubController@store')
            ->name('club-store');

        Route::put('/{club}/update', 'ClubController@update')->name('club-update');

        Route::delete('/{club}/destroy', 'ClubController@destroy')->name('club-destroy');

        Route::get('/{club}/contracts/created', 'ClubController@createdContracts')
            ->name('club-contracts-created');

        Route::get('/{club}/contracts/signed', 'ClubController@signedContracts')
            ->name('club-contracts-signed');

        Route::get('/{club}/contracts/extensionProposed', 'ClubController@extensionProposedContracts')
            ->name('club-contracts-extension-proposed');

        Route::get('/search', 'ClubController@search')
            ->name('clubs-search');

        Route::post('/{club}/join', 'ClubController@join')
            ->name('club-join');

        Route::get('/{club}/requests', 'ClubController@joinRequests')
            ->name('club-join-requests');

        Route::post('/{club}/validateContracts', 'ClubController@validateContracts')
            ->name('club-validate-contracts');
    });

    Route::group(['prefix' => 'requests'], function (){

        Route::delete('/{requestToJoinTheClub}/destroy', 'RequestToJoinTheClubController@destroy')
            ->name('request-to-join-the-club-destroy');
    });

    Route::group(['prefix' => 'contracts'], function (){
        Route::get('/menu', 'ContractController@menu')->name('contracts-menu');
        Route::post('/{contract}/sign', 'ContractController@sign')
            ->name('contract-sign');
        Route::post('/{contract}/proposeExtension', 'ContractController@proposeExtension')
            ->name('contract-propose-extension');
        Route::post('/{contract}/extend', 'ContractController@extend')
            ->name('contract-extend');
        Route::post('/{contract}/rejectExtension', 'ContractController@rejectExtension')
            ->name('contract-reject-extension');
        Route::post('/store/{user}', 'ContractController@store')
            ->name('contract-store');
        Route::delete('/{contract}/destroy', 'ContractController@destroy')->name('contract-destroy');
    });

    Route::group(['prefix' => 'users'], function (){

        Route::get('/{user}/profile', 'UserController@profile')
            ->name('user-profile');

        Route::put('/{user}/update', 'UserController@update')->name('user-update');

        Route::delete('/{user}/destroy', 'UserController@destroy')->name('user-destroy');

        Route::get('/{user}/contracts/created', 'UserController@createdContracts')
            ->name('user-contracts-created');

        Route::get('/{user}/contracts/binding', 'UserController@bindingContract')
            ->name('user-contracts-binding');

        Route::get('/{user}/tournaments/open', 'UserController@openTournaments')
            ->name('user-tournaments-open');

        Route::get('/{user}/tournaments/closed', 'UserController@closedTournaments')
            ->name('user-tournaments-closed');

        Route::post('/{user}/position/add', 'UserController@addFootballPosition')
            ->name('user-football-position-add');

        Route::delete('/{user}/position/{footballPosition}/delete', 'UserController@deleteFootballPosition')
            ->name('user-football-position-delete');

        Route::get('/footballers/listAndSearch', 'UserController@listAndSearch')
            ->name('footballers-list-search');

        Route::get('/footballers/search', 'UserController@search')
            ->name('footballers-search');
    });

    Route::group(['prefix' => 'tournaments'], function (){
        Route::get('/menu', 'TournamentController@menu')->name('tournaments-menu');

        Route::get('/create', 'TournamentController@create')
            ->name('tournament-create');

        Route::post('/store', 'TournamentController@store')
            ->name('tournament-store');

        Route::post('/{tournament}/join', 'TournamentController@join')
            ->name('tournament-join');

        Route::post('/{tournament}/leave', 'TournamentController@leave')
            ->name('tournament-leave');

        Route::get('/listAndSearch', 'TournamentController@listAndSearch')
            ->name('tournaments-list-search');

        Route::get('/search', 'TournamentController@search')
            ->name('tournaments-search');
    });
});
