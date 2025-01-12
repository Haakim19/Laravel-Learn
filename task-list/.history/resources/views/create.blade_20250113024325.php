@extends('layouts.app')

@section('title', 'Add Task')
{{ }}
@section('content')
    <form method="POST" action="{{ route('task.store') }}">
        {{-- using @csrf for authentication perpose like find out the
        unaoutotrized web requests --}}
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div>
            <label for="long_description">Long_Description</label>
            <textarea name="long_description" id="long_description" rows="5"></textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
