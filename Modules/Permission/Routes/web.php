<?php
use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\PerMenuController;
use Modules\Permission\Http\Controllers\RoleController;
use Modules\Permission\Http\Controllers\PermissionController;
use Modules\Permission\Http\Controllers\AssignPermissionToRoleController;

Route::prefix('permissionmenus')->group(function () {

    // Route::middleware(['first', 'second'])->group(function () {

        Route::name('permissionmenu.')->group(function () {

            Route::controller(PerMenuController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{menupermission}', 'show')->name('show');
                Route::get('/{menupermission:uuid}/edit', 'edit')->name('edit');
                Route::put('/{menupermission:uuid}', 'update')->name('update');
                Route::delete('/{menupermission:uuid}', 'destroy')->name('destroy');
            });
        });


        Route::name('roles.')->group(function () {

            Route::controller(RoleController::class)->group(function () {
                Route::get('role/permission/', 'index')->name('index');
                Route::get('role/permission/create', 'create')->name('create');
                Route::post('role/permission/', 'store')->name('store');
                Route::get('role/permission/{role}', 'show')->name('show');
                Route::get('role/permission/{role}/edit', 'edit')->name('edit');
                Route::put('role/permission/{role}', 'update')->name('update');
                Route::delete('role/permission/{role}', 'destroy')->name('destroy');
            });
        });

        Route::name('permissions.')->group(function () {

            Route::controller(PermissionController::class)->group(function () {
                Route::get('get/permission/permission/', 'index')->name('index');
                Route::get('get/permission/permission/create', 'create')->name('create');
                Route::post('get/permission/permission/', 'store')->name('store');
                Route::get('get/permission/permission/{getpermission}', 'show')->name('show');
                Route::get('get/permission/permission/{getpermission}/edit', 'edit')->name('edit');
                Route::put('get/permission/permission/{getpermission}', 'update')->name('update');
                Route::delete('get/permission/permission/{getpermission}', 'destroy')->name('destroy');
            });
        });




        Route::name('assignrolepermissions.')->group(function () {

            Route::controller(AssignPermissionToRoleController::class)->group(function () {
                Route::get('assign/permissin/to/role/{role}', 'index')->name('index');
                Route::get('assign/role/to/usre/', 'assignroletouser')->name('assignroletouser');
                Route::get('assign/permissin/to/role/create', 'create')->name('create');
                Route::post('assign/permissin/to/role/', 'store')->name('store');
                Route::post('assign/role/to/user/', 'storeroleuser')->name('storeroleuser');
                Route::get('assign/permissin/to/list/role', 'assingRole')->name('assingRole');
                Route::get('assign/role/user/list', 'assignRoleUserList')->name('assignRoleUserList');
                Route::get('assign/permissin/to/role/{getpermission}/edit', 'edit')->name('edit');
                Route::put('assign/permissin/to/role/{getpermission}', 'update')->name('update');
                Route::delete('assign/permissin/to/role/{getpermission}', 'destroy')->name('destroy');
            });
        });

    // });

});
