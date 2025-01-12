@extends('layouts.app')

@section('title', 'Add Task')
    <form method="POST" action="{{ route('task.store') }}"></form>
@endsection
