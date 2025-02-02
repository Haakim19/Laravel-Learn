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
    $data = $request->validated();

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['id' => $task->id])
        ->with('success', 'Task created succesfully!');
})->name('task.store');

//editing a task
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $data = $request->validated();

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.show', ['id' => $task->id])
        ->with('success', 'Task updated succesfully!');
})->name('task.update');
