<h1>
    The list of Tasks1
</h1>

</div>
    @if (count($tasks))
        @foreach ($tasks as $task)
            <div>{{ $task->title }}</div>
        @endforeach
    @else
        <div>There is no tasks</div>
    @endif
<div>
