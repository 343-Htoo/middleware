<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

    Route::get('/user', [UserdataController::class, 'index'])->name('user.index')->middleware('can:view .user');
    Route::post('/user', [UserdataController::class, 'store'])->name('user.store')->middleware('can:store.user');
    Route::get('/user/{id}', [UserdataController::class, 'edit'])->name('user.edit')->middleware('can:edit .user');
    Route::post('/user/{id}', [UserdataController::class, 'update'])->name('user.update')->middleware('can:update .user');
    Route::get('/user/delete/{id}', [UserdataController::class, 'delete'])->name('user.delete')->middleware('can:delete .user');
    Route::get('/user/view/{id}', [UserdataController::class, 'show'])->name('user.view')->middleware('can:view .user');



    Route::get('/class', [ClassroomController::class, 'index'])->name('class.index')->middleware('can:view.teacher');
    Route::post('/class', [ClassroomController::class, 'store'])->name('class.store')->middleware('can:store.teacher');
    Route::get('/class/{id}', [ClassroomController::class, 'edit'])->name('class.edit')->middleware('can:edit.teacher');
    Route::post('/class/{id}', [ClassroomController::class, 'update'])->name('class.update')->middleware('can:update.teacher');
    Route::get('/class/delete/{id}', [ClassroomController::class, 'delete'])->name('class.delete')->middleware('can:destory.teacher');
    Route::get('/class/view/{id}', [ClassroomController::class, 'show'])->name('class.show')->middleware('can:view.teacher');


    // Student Routes
Route::get('/student', [StudentController::class, 'index'])->name('student.index')->middleware('can:view.teacher');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create')->middleware('can:create.teacher');
Route::post('/student', [StudentController::class, 'store'])->name('student.store')->middleware('can:store.teacher');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show')->middleware('can:show.teacher');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit')->middleware('can:edit.teacher');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update')->middleware('can:update.teacher');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->middleware('can:destory.teacher');


require __DIR__.'/auth.php';
