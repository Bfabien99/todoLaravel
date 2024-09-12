@extends('layout.todo')
@section('title') Home @endsection
@section('content')
<div>
    <h3>Todos</h3>
    @if ($todos->count())
        <div>
            @foreach ($todos as $todo)
                <div>
                    <p>{{$todo->title}}</p>
                    <a href="{{route('todos.show', $todo)}}">show</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun Todo enregistrés</p>
    @endif
</div>
@endsection