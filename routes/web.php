<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;



Route::get('/register', function () {
    return view('register');
});

// Route::get('/login', function () {
//     return view('login');
// });


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    // Rute yang memerlukan otentikasi
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/admin', function () {
        return view('admin');
    })->middleware('auth:sanctum', 'admin');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth:sanctum', 'verified']); // Memastikan pengguna telah terautentikasi dan diverifikasi
    
    Route::get('/admin/users', [AdminController::class, 'getUnverifiedUsers'])->middleware(['auth:sanctum', 'admin']);
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/verify-user/{id}', [AdminController::class, 'verifyUser'])->middleware(['auth:sanctum', 'admin']);
    Route::post('/users/{id}/verify', [UserController::class, 'verifyUser'])->name('users.verify');

Route::get('/users', [UserController::class, 'index'])->name('users.index');


});    

