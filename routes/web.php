<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\genaralController;
use App\Http\Controllers\Office\officeDashController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(genaralController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/setdashboard', 'setDashboard')->name('setDashboard');
    Route::get('/set-new-password', 'setNewPass')->name('setNewPass');
    Route::post('set-new-pass', 'setNewPassword')->name('setNewPassword');
    Route::get('/sys-users', 'sysUsers')->name('sysUsers');
    Route::get('show-password/{id}/{tempPass}', 'showPass')->name('showPass');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'role:Admin', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'getAdminDashboard')->name('adminDashboard');
        Route::get('/get-user-update/{id}', 'getUpdateUser')->name('getUpdateUser');
    });

});

Route::middleware(['auth:sanctum', 'role:Admin|Manager','checkPasswordReset', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(userController::class)->group(function () {
        Route::get('/new-user', 'getNewUser')->name('newUser');
        Route::post('/store-new-user', 'storeUser')->name('storeUser');
        Route::post('/delete-user/{id}', 'deleteUser')->name('deleteUser');
    });

});



Route::prefix('office')->middleware(['auth:sanctum', 'role:Manager|Finance|Coordinator|Consultant','checkPasswordReset', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(officeDashController::class)->group(function () {
        Route::get('/dashboard', 'getOfficeDashboard')->name('officeDashboard');
    });

});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});
