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


Route::middleware(['web', 'auth'])->prefix('userpanel')->group(function() {

    Route::get('/guest', 'GuestController@index')->name('userpanel.guest');
    
   // Route::post('/update-startup-profile', 'StartupController@updateStartupProfile')->name('userpanel.startup.update-profile');


    Route::get('/startup', 'StartupController@index')->name('userpanel.startup');
    Route::post('/update-startup-profile', 'StartupController@updateStartupProfile')->name('userpanel.startup.update-profile');

    Route::get('/investor', 'InvestorController@index')->name('userpanel.investor');
    Route::post('/update-investor-profile', 'InvestorController@updateInvestorProfile')->name('userpanel.investor.update');
    Route::get('/delete-investor-doc/{doc_id}', 'InvestorController@destroyDoc')->name('userpanel.investor.delete_doc');

    Route::get('/hub', 'HubsController@index')->name('userpanel.hub');
    Route::post('/update-hub-profile', 'HubsController@updateHubProfile')->name('userpanel.hub.update');
    Route::get('/delete-hub-doc/{doc_id}', 'HubsController@destroyDoc')->name('userpanel.hub.delete_doc');

});

Route::middleware(['web', 'auth'])->prefix('userpanel')->group(function() {

    Route::get('/overview', 'UserPanelController@index')->name('userpanel.overview');
    Route::get('/delete-event-speaker/{id}', 'UserPanelController@deleteSpeaker')->name('userpanel.delete.event.speaker');
    Route::get('/delete-startup-doc/{doc_id}', 'UserPanelController@destroyDoc')->name('userpanel.startup.delete_doc');



    Route::get('/team-list', 'UserPanelController@teamList')->name('userpanel.team-list');
    Route::post('/add-team-member', 'UserPanelController@addMember')->name('userpanel.add-member');
    Route::get('/member-edit/{id}', 'UserPanelController@editMember')->name('userpanel.member.edit');
    Route::post('/member-update/{id}', 'UserPanelController@updateMember')->name('userpanel.member.update');
    Route::get('/member-delete/{id}', 'UserPanelController@deleteMember')->name('userpanel.member.delete');


    Route::get('/news-list', 'UserPanelController@newsList')->name('userpanel.news-list');
    Route::post('/news-create', 'UserPanelController@newsCreate')->name('userpanel.news-create');
    Route::get('/news-edit/{id}', 'UserPanelController@editNews')->name('userpanel.news.edit');
    Route::post('/news-update/{id}', 'UserPanelController@updateNews')->name('userpanel.news.update');
    Route::get('/news-delete/{id}', 'UserPanelController@deleteNews')->name('userpanel.news.delete');

    Route::get('/favorite-delete/{id}', 'UserPanelController@deleteFavorite')->name('userpanel.favorite.delete');
    Route::get('/follow-delete/{id}', 'UserPanelController@deleteFollow')->name('userpanel.follow.delete');


    Route::get('/report-list', 'UserPanelController@reportList')->name('userpanel.report.list');

    Route::get('/tag-list', 'UserPanelController@tagList')->name('userpanel.tag.list');
    Route::post('/tag-add', 'UserPanelController@addTag')->name('userpanel.add.tag');
    Route::get('/delete-tag/{id}', 'UserPanelController@deleteTag')->name('userpanel.tag.delete');


    Route::get('/event-list', 'UserPanelController@eventList')->name('userpanel.event.list');
    Route::post('/event-add', 'UserPanelController@addEvent')->name('userpanel.add.event');
    Route::get('/event-edit/{id}', 'UserPanelController@editEvent')->name('userpanel.event.edit');
    Route::post('/event-update/{id}', 'UserPanelController@updateEvent')->name('userpanel.event.update');
    Route::get('/delete-event/{id}', 'UserPanelController@deleteEvent')->name('userpanel.event.delete');

    Route::get('/password-setting', 'UserPanelController@passwordSettings')->name('userpanel.password.setting');
    Route::post('/update-password', 'UserPanelController@updatePassword')->name('userpanel.update-password');



});
