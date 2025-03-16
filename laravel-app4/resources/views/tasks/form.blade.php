@extends("layouts.app")

@section("title",$title)


@section("content") 
    <form method="POST" action="{{ isset($task) ? route('tasks.update') : route('tasks.store')}}">
        @isset($task)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $task->id}}">
        @endisset
        <div class="mb-4">
            <label for="name">
                Name1
            </label>
            <input type="text" name="name" id="name" @class(["border-red-500"=>$errors->has("name")]) value="{{ $task->name ?? old('name')}}"></input>
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="desc">
            Desc
            </label>
            <textarea  name="desc" id="desc" rows="5" @class(["border-red-500"=>$errors->has("desc")]) >{{ $task->desc ?? old('desc')}}</textarea>
            @error('desc')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_desc">
            Long Desc
            </label>
            <textarea  name="long_desc" id="long_desc" rows="10" @class(["border-red-500"=>$errors->has("long_desc")]) >{{ $task->long_desc ?? old('long_desc')}}</textarea>
            @error('long_desc')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" class="btn">@isset($task)
                Edit task
                @else
                Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
        @csrf
    </form>
    
@endsection

