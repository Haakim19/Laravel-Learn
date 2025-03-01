@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store') }}">
        {{-- using @csrf for authentication perpose like find out the
        unaoutotrized web requests --}}
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        </div>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="long_description">Long_Description</label>
            <textarea name="long_description" id="long_description" rows="5">{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection
