<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:senctum')->group(function () {
    Route::get('/check-session', [AuthController::class, 'checkSession']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
