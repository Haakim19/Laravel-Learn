<h1>
    The list of Tasks1
</h1>

</div>
    @if (count($tasks))
        @foreach ($tasks as $task)

        @endforeach
        <div>There are Tasks!</div>
    @else
        <div>THere is no Tasks</div>
    @endif
<div>
