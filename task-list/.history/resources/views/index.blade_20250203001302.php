@extends('layouts.app')

@section('title','Tha list of task')
@section('content')
    <div>
        <a href="{{ route('task.create') }}">Add Task</a>
    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show',['task'=> $task->id])}}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There is no tasks</div>
        @endforelse
    {{-- @endif --}}
    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
