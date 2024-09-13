@extends('layout.todo')
@section('title') Details @endsection
@section('content')
<div>
    <div>
    @if(session()->has('error'))
        <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('success')}}</p>
        @endif
    </div>
    <h3>Detail</h3>
    <div>
        <p><span>Todo:</span> <span>{{$todo->title}}</span></p>
        <p><span>Completed:</span> <span>{{$todo->completed ? 'Yes' : 'No'}}</span></p>
        <p><span>Limit:</span> <span>{{$todo->limit_date ? $todo->limit_date : 'Not defined'}}</span></p>
    </div>
    <div>
        <span>Detail: </span>
        <cite>
            {{$todo->detail}}
        </cite>
    </div>
    <div>
        <div>
        @if ($todo->completed)
        <a class="hover:text-blue-400" href="{{route('todos.undone', $todo)}}">Undone</a>
        @else
        <a class="hover:text-blue-400" href="{{route('todos.complete', $todo)}}">Complete</a>
        @endif
        <a class="hover:text-blue-400" href="{{route('todos.edit', $todo)}}">Update</a>
        </div>
        <form action="{{route('todos.destroy', $todo)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="border rounded-sm p-2">Delete</button>
        </form>
    </div>
</div>
@endsection