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

Route::prefix('paymentgateway')->middleware(['auth'])->group(function() {

    Route::get('/', 'PaymentGatewayController@index');
    Route::get('check-payment', 'PaymentGatewayController@checkPayment')->name('check-payment');

    Route::get('flutterwave-payment', 'PaymentGatewayController@redireacUrl')->name('flutterwave-payment');
    
    Route::get('payment-success', 'PaymentGatewayController@paymentSuccess')->name('payment-success');
    Route::get('payment-fail', 'PaymentGatewayController@paymentFail')->name('payment-fail');

    Route::get('setting', 'PaymentGatewayController@settingGateway')->name('setting');
    Route::post('update-gateway', 'PaymentGatewayController@updateGateway')->name('update-gateway');

});
