<h1>
    The list of Tasks1
</h1>

</div>
    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>{{ $task->title }}</div>
        @empty
            <div>There is no tasks</div>
        @endforelse
    {{-- @endif --}}
<div>
