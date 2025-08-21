<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Permission

    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index')->middleware('can:view-permission');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store')->middleware('can:store-permission');
    Route::get('/permission/{id}', [PermissionController::class, 'edit'])->name('permission.edit')->middleware('can:edit-permission');
    Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update')->middleware('can:update-permission');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete')->middleware('can:delete-permission');
    Route::get('/permission/view/{id}', [PermissionController::class, 'show'])->name('permission.view')->middleware('can:view-permission');


// Role routes

    Route::get('/role', [RoleController::class, 'index'])->name('role.index')->middleware('can:view-role');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store')->middleware('can:store-role');
    Route::get('/role/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware('can:edit-role');
    Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete')->middleware('can:delete-role');


// User routes

    Route::get('/user', [UserdataController::class, 'index'])->name('user.index');
    Route::post('/user', [UserdataController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserdataController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}', [UserdataController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserdataController::class, 'delete'])->name('user.delete');
    Route::get('/user/view/{id}', [UserdataController::class, 'show'])->name('user.view');



    Route::get('/class', [ClassroomController::class, 'index'])->name('class.index');
    Route::post('/class', [ClassroomController::class, 'store'])->name('class.store');
    Route::get('/class/{id}', [ClassroomController::class, 'edit'])->name('class.edit');
    Route::post('/class/{id}', [ClassroomController::class, 'update'])->name('class.update');
    Route::get('/class/delete/{id}', [ClassroomController::class, 'delete'])->name('class.delete');
    Route::get('/class/view/{id}', [ClassroomController::class, 'show'])->name('class.view');


 Route::get('/student', [TeacherController::class, 'index'])->name('student.index');
Route::post('/student', [TeacherController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [TeacherController::class, 'edit'])->name('student.edit');
Route::post('/student/{id}', [TeacherController::class, 'update'])->name('student.update');
Route::get('/student/delete/{id}', [TeacherController::class, 'delete'])->name('student.delete');
Route::get('/student/view/{id}', [TeacherController::class, 'show'])->name('student.view');




require __DIR__.'/auth.php';
