@extends('layout.todo')
@section('title') Details @endsection
@section('content')
<div>
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
        <a href="{{route('todos.edit', $todo)}}">Update</a>
        <form action="{{route('todos.destroy', $todo)}}" method="post">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
</div>
@endsection