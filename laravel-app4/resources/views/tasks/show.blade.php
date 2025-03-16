@extends("layouts.app")

@section("title",$title)

@section("content") 


    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>

    <p>{{ $tasks->name }}</p>
    <p>{{ $tasks->desc }}</p>
    <p>{{ $tasks->long_desc }}</p>
    <p class="mb-4 text-sm text-slate-500">Created {{ $tasks->created_at->diffForHumans() }} • updated {{ $tasks->updated_at->diffForHumans() }} </p>
    <p></p>

    <p class="mb-4">
        @if($tasks->completed)
            <span class="text-medium text-green-500">Completed</span>
        @else
        <span class="text-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit',['task' => $tasks])}}" class="btn">Edit</a>

        <form action="{{ route('tasks.toggle-complete',['task'=>$tasks]) }}" method="POST">
            @csrf
            @method("PUT")
            <button type="submit" class="btn">
                Mark as {{ $tasks->completed ? 'not completed' : 'complete'}}
            </button>
        </form>

        <form action="{{ route('tasks.delete',['task'=>$tasks]) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
    
@endsection
