<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserdataController;
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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::get('/permission/view/{id}', [PermissionController::class, 'show'])->name('permission.view');
});

// Role routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}', [RoleController::class, 'edit'])->name('role.edit');
});

// User routes
Route::middleware(['auth', 'custom'])->group(function () {
    Route::get('/user', [UserdataController::class, 'index'])->name('user.index');
    Route::post('/user', [UserdataController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserdataController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}', [UserdataController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserdataController::class, 'delete'])->name('user.delete');
    Route::get('/user/view/{id}', [UserdataController::class, 'show'])->name('user.view');
});

require __DIR__.'/auth.php';
