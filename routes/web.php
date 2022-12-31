<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\Hubs;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\frontend\Blogs;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontend\Events;
use App\Http\Controllers\frontend\SignUp;
use App\Http\Controllers\frontend\SingIn;
use App\Http\Controllers\frontend\Contact;
use App\Http\Controllers\frontend\Pricing;
use App\Http\Controllers\frontend\Reports;
use App\Http\Controllers\StartupDashboard;
use App\Http\Controllers\frontend\Companies;
use App\Http\Controllers\frontend\Investors;
use App\Http\Controllers\frontend\LandingController;
use App\Http\Controllers\frontend\StartupController;
use App\Http\Controllers\PassManagement\PasswordManage;


Route::get('/link', function () {
    Artisan::call('optimize:clear');
    //     Artisan::call('storage:link');
});

Route::get('/admin', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::middleware(['web', 'auth','admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/startup-backend/dashboard', [StartupDashboard::class, 'StartupDashboard'])->name('startup-backend.dashboard');

Route::get('reset-password',[PasswordManage::class,'passwordResetForm'])->name('request.password');
Route::get('news-password',[PasswordManage::class,'addPasswordForm'])->name('new.password');

Route::get('/', [LandingController::class, 'index']);

Route::post('/chart-one', [LandingController::class,'chartOne'])->name('chart-one');
Route::post('/chart-two', [LandingController::class,'chartTwo'])->name('chart-two');
Route::post('/chart-three', [LandingController::class,'chartThree'])->name('chart-three');
Route::post('/chart-four', [LandingController::class,'chartFour'])->name('chart-four');
Route::post('/chart-five', [LandingController::class,'chartFive'])->name('chart-five');



Route::get('/startups', [StartupController::class, 'index']);
Route::get('/startup-detail/{id}', [StartupController::class, 'startupDetail'])->name('startup.detail');
Route::post('/startup-create', [StartupController::class, 'startupCreate'])->name('startup.create');

Route::get('/follo-up/{id}', [StartupController::class, 'followUp'])->name('follo-up');
Route::get('/add-to-up/{id}', [StartupController::class, 'addToFavorite'])->name('add-to-up');


Route::get('/sign-up', [SignUp::class, 'index']);
Route::post('/sign-up-check', [SignUp::class, 'signUpCheck']);
Route::get('/sign-in',[SingIn::class,'index'])->name('sign-in');
Route::get('/verify-email/{token}',[SingIn::class,'verifyEmail'])->name('verify-email');





Route::get('/companie', [Companies::class, 'index']);
Route::get('/contact-us', [Contact::class, 'index']);
Route::post('/send-mail', [Contact::class, 'sendMail'])->name('send-mail');
Route::get('/privacy-policy', [Contact::class, 'PrivacyPolicy']);




Route::get('/investor', [Investors::class, 'index']);
Route::get('/investor-detail/{id}', [Investors::class, 'InvestorDetail'])->name('investor.detail');

Route::get('/hubs', [Hubs::class, 'index']);
Route::get('/hub-detail/{id}', [Hubs::class, 'hubDetail'])->name('hub.detail');

Route::get('/events', [Events::class, 'index']);
Route::get('/event-details/{id}', [Events::class, 'eventDetails'])->name('event.detail');

Route::get('/reports', [Reports::class, 'index']);
Route::get('/report-detail/{id}', [Reports::class, 'reportDetail'])->name('report.detail');

Route::get('/buy-report', [Reports::class, 'buyCheckReport'])->name('report.buy');



Route::get('/pricing', [Pricing::class, 'index']);
Route::get('/blog', [Blogs::class, 'index']);
Route::get('/post-detail/{id}', [Blogs::class, 'postDetails'])->name('post.detail');
Route::get('/category-post/{slug}', [Blogs::class, 'categoryWisePost'])->name('category-post');
Route::get('/post-search', [Blogs::class, 'postSearch'])->name('post-search');

