<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Login Route
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware(['auth:sanctum']);

// Public Routes for events
Route::apiResource('events', EventController::class)
    ->only(['index', 'show']);

// Protected Routes for events
Route::apiResource('events', EventController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth:sanctum']);

// Public Routes for attendees
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped()
    ->only(['index', 'show']);

// Private Route for attendees
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped()
    ->only('store', 'destroy')
    ->middleware(['auth:sanctum', 'throttle:api']);
