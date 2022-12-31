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

Route::middleware(['web', 'auth'])->group(function () {

    Route::resource('teams', TeamsController::class);
    Route::get('get-teams', 'TeamsController@getTeams')->name('get-teams');
    Route::get('delete-team/{id}', 'TeamsController@destroy')->name('delete-team');

});
