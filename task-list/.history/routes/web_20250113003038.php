<?php

use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return view('index', []);
})->name('task.index');
Route::get('/tasks/{id}', function ($id) {
    return 'one single task';
})->name('task.show');
// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

// Route::fallback(function () {
//     return 'still got somewhere';
// });
