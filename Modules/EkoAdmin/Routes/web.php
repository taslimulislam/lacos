<?php

use Illuminate\Support\Facades\Route;
use Modules\EkoAdmin\Http\Controllers\AcademiaController;
use Modules\EkoAdmin\Http\Controllers\DealsController;
use Modules\EkoAdmin\Http\Controllers\EventController;
use Modules\EkoAdmin\Http\Controllers\InvestorController;
use Modules\EkoAdmin\Http\Controllers\HubController;
use Modules\EkoAdmin\Http\Controllers\OrganizationClaimController;
use Modules\EkoAdmin\Http\Controllers\ResearchController;
use Modules\EkoAdmin\Http\Controllers\StartUpController;
use Modules\EkoAdmin\Http\Controllers\SubscriptionController;

Route::middleware('auth','web')->prefix('admin')->name('admin.')->group(function () {

    //    investor
    Route::prefix('investor')->name('investor.')->controller(InvestorController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('export', 'export')->name('export');
        Route::post('import', 'import')->name('import');
        Route::get('edit/{investor:uuid}', 'edit')->name('edit');
        Route::put('update/{investor:uuid}', 'update')->name('update');
        Route::get('delete-investor-doc/{investor_id}/{doc_id}', 'destroy_doc')->name('delete_doc');
        Route::get('delete/{investor:uuid}', 'destroy')->name('delete');
    });
    //    hubs
    Route::prefix('hubs')->name('hubs.')->controller(HubController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('export', 'export')->name('export');
        Route::post('import', 'import')->name('import');
        Route::get('edit/{hub:uuid}', 'edit')->name('edit');
        Route::put('update/{hub:uuid}', 'update')->name('update');
        Route::get('delete/{hub:uuid}', 'destroy')->name('delete');
        Route::get('delete-hub-doc/{hub_id}/{doc_id}', 'destroy_doc')->name('delete_doc');

    });

    //    startups
    Route::prefix('startups')->name('startups.')->controller(StartUpController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::get('export', 'export')->name('export');
        Route::post('import', 'import')->name('import');
        Route::get('delete/{startup_id}', 'destroy')->name('delete');
        Route::get('delete-doc/{startup_id}/{doc_id}', 'destroy_doc')->name('delete_doc');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
    });

    //    academia
    Route::prefix('academia')->name('academia.')->controller(AcademiaController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::get('delete/{id}', 'destroy')->name('delete');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
    });

    //    subscription
    Route::prefix('plans')->name('plans.')->controller(SubscriptionController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::get('delete/{id}', 'destroy')->name('delete');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
    });

    //    claim
    Route::prefix('claim')->name('claim.')->controller(OrganizationClaimController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('approve/{id}', 'approve')->name('approve');
        Route::get('decline/{id}', 'decline')->name('decline');
    });

    //    event
    Route::prefix('event')->name('event.')->controller(EventController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('approve/{id}', 'approve')->name('approve');
        Route::get('decline/{id}', 'decline')->name('decline');
    });

    //    research
    Route::prefix('research')->name('research.')->controller(ResearchController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('approve/{id}', 'approve')->name('approve');
        Route::get('decline/{id}', 'decline')->name('decline');
    });

    Route::resource('deals', DealsController::class);
    Route::get('get-deals', 'DealsController@getDealList')->name('deals.deal-list');
    
});
