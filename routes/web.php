<?php

use App\Http\Controllers\Admin\classController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\genaralController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\teacherController;
use App\Http\Controllers\Office\officeDashController;

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
    Route::get('/dashboard', 'setDashboard')->name('dashboard');
});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('/appointments', 'index');
    Route::post('/deleteAppointment/{id}', 'deleteAppointment')->name('deleteAppointment');
    Route::post('create-appointment/{studentId}', 'createAppointment')->name('createAppointment');
});



Route::middleware(['auth:sanctum', 'role:Admin|Manager|Coordinator|Finance|Teacher', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(genaralController::class)->group(function () {
        Route::get('/set-new-password', 'setNewPass')->name('setNewPass');
        Route::post('set-new-pass', 'setNewPassword')->name('setNewPassword');
        Route::get('/sys-users', 'sysUsers')->name('sysUsers');
        Route::get('/show-password/{id}/{tempPass}', 'showPass')->name('showPass');
        Route::get('/get-user-update/{id}', 'getUpdateUser')->name('getUpdateUser');
        Route::post('update-user{id}', 'updateUser')->name('updateUser');
        Route::post('updateUserPassword/{id}', 'updateUserPassword')->name('updateUserPassword');
        Route::get('/user/{id}', 'user')->name('user');
    });

    Route::controller(studentController::class)->group(function () {
        Route::get('/new-student', 'newStudent')->name('newStudent');
        Route::post('/store-student', 'storeStudent')->name('storeStudent');
        Route::get('/students', 'students')->name('students');
        Route::get('/student/{id}', 'student')->name('student');
        Route::post('/search/students', 'searchStudents')->name('search.students');
        Route::get('/edit-student/{id}', 'editStudent')->name('editStudent');
        Route::post('/delete-student/{id}', 'deleteStudent')->name('deleteStudent');
        Route::post('/update-student/{id}', 'updateStudent')->name('updateStudent');
        Route::post('/assign-consultant{studentId}', 'assignConsultant')->name('assignConsultant');
        Route::post('/get-students-by-date-range','getStudentsByDateRange')->name('getStudentsByDateRange');
    });

});

Route::prefix('admin')->middleware(['auth:sanctum', 'role:Admin', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'getAdminDashboard')->name('adminDashboard');
        Route::get('/time-slots', 'getTimeSlots')->name('getTimeSlots');
        Route::post('new-time-slots', 'newTimeSlot')->name('newTimeSlot');
        Route::post('/update-user{id}', 'updateTimeSlot')->name('updateTimeSlot');
        Route::post('destroy-timieslot/{id}', 'destroytimeSlot')->name('destroytimeSlot');
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

Route::middleware(['auth:sanctum', 'role:Admin','checkPasswordReset', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::controller(classController::class)->group(function () {
        Route::get('/new-class', 'newClass')->name('newClass');
        Route::get('/classes', 'classes')->name('classes');
        Route::post('/store-class', 'storeClass')->name('storeClass');
        Route::get('/class/{id}', 'class')->name('class');
        Route::post('/delete-class/{id}', 'deleteClass')->name('deleteClass');
        Route::post('/update-class/{id}', 'updateClass')->name('updateClass');
    });

    Route::controller(teacherController::class)->group(function () {
        Route::get('/new-teacher', 'newTeacher')->name('newTeacher');
        Route::get('/teachers', 'teachers')->name('teachers');
        Route::post('/store-teacher', 'storeTeacher')->name('storeTeacher');
        Route::get('/teacher/{id}', 'teacher')->name('teacher');
    });

});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified', ])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});
