<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->where('completed', true)->get()
    ]);
})->name('task.index');

Route::view('tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('task.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);
})->name('task.store');

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
