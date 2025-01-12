@extends('layouts.app')

@section('title', 'Add Task')
    <form method="POST" action="{{ route('task.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title">
        </div>
    </form>
@endsection
