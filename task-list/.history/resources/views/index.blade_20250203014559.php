@extends('layouts.app')

@section('title', 'Tha list of task')
@section('content')
    <nav class="mb-4">
        <a href="{{ route('task.create') }}" class="link">Add Task</a>
    </nav>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['task' => $task->id]) }}" @class(['line-through font-bold' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There is no tasks</div>
    @endforelse
    {{-- @endif --}}
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
