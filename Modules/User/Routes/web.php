<?php

use Modules\User\Http\Controllers\UserTypeController;
use Modules\User\Http\Controllers\PasswordSettingController;
// use Modules\User\Http\Controllers\TeacherController;

Route::resource('user-types' , UserTypeController::class);
Route::resource('password-settings' , PasswordSettingController::class);
// Route::resource('teachers' , TeacherController::class);
