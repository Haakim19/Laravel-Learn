@extends('layouts.app')

@section('title', 'Add Task')
    <form method="POST" action="{{ route('task.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
        </div>
    </form>
@endsection
