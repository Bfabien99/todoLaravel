@extends('layout.todo')
@section('title') Home @endsection
@section('content')
<div>
    <h3>Todos</h3>
    <div>
        @if(session()->has('error'))
            <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
    @if ($todos->count())
        <div>
            @foreach ($todos as $todo)
                <div>
                    <p>{{$todo->title}}</p>
                    <a class="hover:text-blue-400" href="{{route('todos.show', $todo)}}">show</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No todo available</p>
    @endif
</div>
@endsection