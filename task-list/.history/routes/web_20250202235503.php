<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;

Route::get('/', function () {
    return redirect()->route('task.index');
});
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::orderBy('created_at', 'desc')->get()
    ]);
})->name('task.index');

Route::view('tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

//Adding a new task
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task created succesfully!');
})->name('task.store');

//editing a task
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task updated succesfully!');
})->name('task.update');

//deleting a task
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('task.index')
        ->with('success', 'Task deleted succesfully!');
})->name('task.destroy');
