<?php
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\BackupController;

Route::middleware('auth','web')->group(function () {

    Route::resource('applications','ApplicationController');
    Route::resource('currencies','CurrencyController');
    // Route::resource('countries','CountryController');
    // Route::get('currencies/status/{id}', [CurrencyController::class, 'status'])->name('currencies.status');
    // Route::get('lang/status/{id}', [LanguageController::class, 'status'])->name('lang.status');
    Route::resource('mails','MailController');
    Route::resource('sms','SMSController');
    // Route::get('lang','LanguageController@index')->name('lang.index');
    // Route::post('lang-store','LanguageController@store')->name('lang.store');
    // Route::get('lang-edit/{slug}','LanguageController@edit')->name('lang.edit');
    // Route::post('lang-update/{slug}','LanguageController@update')->name('lang.update');
    // Route::get('pharse-export/{slug}','LanguageController@exportLangPharse')->name('lang.export');
    // Route::post('pharse-import/{slug}','LanguageController@importLangPharse')->name('lang.import');
    Route::get('data-restore',[BackupController::class, 'restoreDatabase'])->name('backup.restore');
});


Route::middleware(['web', 'auth', 'backup'])->group(function () {
    Route::get('backup','BackupController@index')->name('backup.index');
    Route::get('backup-confirm','BackupController@confirm')->name('backup.confirm');
});

Route::middleware(['web', 'auth', 'import'])->group(function () {
    Route::get('database-import','BackupController@import')->name('backup.import');
    Route::post('import-confirm' , 'BackupController@importConfirm')->name('import.confirm');
});
