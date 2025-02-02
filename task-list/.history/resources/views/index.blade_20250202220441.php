@extends('layouts.app')

@section('title','Tha list of task')
@section('content')
<a href="{{ route('task.show',['id'=> $task->id])}}">{{ $task->title }}</a>
    {{-- @if (count($tasks)) --}}
        {{-- @forelse ($tasks as $task)
            <div>
            </div>
        @empty
            <div>There is no tasks</div>
        @endforelse --}}
    {{-- @endif --}}
@endsection
