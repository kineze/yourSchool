<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\genaralController;
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
});

Route::prefix('admin')->middleware(['auth:sanctum', 'role:Admin', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'getAdminDashboard')->name('adminDashboard');
    });

    Route::controller(userController::class)->group(function () {
        Route::get('/new-user', 'getNewUser')->name('newUser');
        Route::post('/store-new-user', 'storeUser')->name('storeUser');
    });

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});
