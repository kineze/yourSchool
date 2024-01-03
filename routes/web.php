<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\genaralController;
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

Route::middleware(['auth:sanctum', 'role:Admin', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(dashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'getAdminDashboard')->name('adminDashboard');
    });

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});
