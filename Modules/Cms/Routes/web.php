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

use Modules\Cms\Http\Controllers\MideaLibraryController;

Route::middleware('auth','web')->group(function () {

    Route::prefix('cms')->group(function() {

        Route::resource('websetup', WebsetupController::class);
        Route::post('update-setup', 'WebsetupController@updateSetup')->name('update-setup');

        Route::get('social-link', 'WebsetupController@socialLink')->name('social-link');
        Route::post('update-social-link', 'WebsetupController@updateSocialLink')->name('update-social-link');
        Route::get('privacy-policy-setup', 'CmsController@privacyPolicy')->name('privacy-policy-setup');
        Route::post('privacy-policy-update', 'CmsController@updatePrivacyPolicy')->name('privacy-policy-update');
        
    });

    Route::get('make-reat-all', 'CmsController@makeReadAll')->name('make-reat-all');

    Route::resource('categories', PostCategoryController::class);
    Route::get('delete-category/{id}', 'PostCategoryController@destroy')->name('delete-category');

    Route::resource('posts', PostController::class);
    Route::get('delete-post/{id}', 'PostController@destroy')->name('delete-post');
    Route::get('get-post-list', 'PostController@getPost')->name('get-post-list');

    Route::resource('statistical-report', StatisticalReportController::class);
    Route::get('delete-report/{id}', 'StatisticalReportController@destroy')->name('delete-report');
    
    Route::get('get-report-list', 'StatisticalReportController@getReports')->name('get-report-list');


});
