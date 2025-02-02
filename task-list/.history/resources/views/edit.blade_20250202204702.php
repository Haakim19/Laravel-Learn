@extends('layouts.app')

@section('title', 'edit Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection
@section('content')
    <form method="POST" action="{{ route('task.store') }}">
        {{-- using @csrf for authentication perpose like find out the
        unaoutotrized web requests --}}
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
        </div>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <label for="long_description">Long_Description</label>
            <textarea name="long_description" id="long_description" rows="5">{{$task->description}}</textarea>
        </div>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
