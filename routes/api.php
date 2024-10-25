<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/verify-user/{id}', [AuthController::class, 'verifyUser']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\AdminController;

Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index']); // Melihat semua pengguna
    Route::post('/admin/verify-user/{id}', [AdminController::class, 'verifyUser']); // Verifikasi pengguna
});

