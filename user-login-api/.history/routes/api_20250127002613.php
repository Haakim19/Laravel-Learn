<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:senctum')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/check-session', [AuthController::class, 'checkSession']);
    Route::get('/user', [AuthController::class, 'user']);
});
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
