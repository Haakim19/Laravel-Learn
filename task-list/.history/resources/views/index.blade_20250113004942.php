<h1>
    The list of Tasks1
</h1>

</div>
    {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show',['id'=> $task->id])}}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There is no tasks</div>
        @endforelse
    {{-- @endif --}}
<div>
