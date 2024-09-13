@extends('layout.todo')
@section('title') Home @endsection
@section('content')
<div class="flex flex-col gap-2 w-full max-w-screen-lg mx-auto">
    <h3 class="text-center font-medium text-lg">Todos</h3>
    <div class="mx-auto">
        @if(session()->has('error'))
            <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
    @if ($todos->count())
        <div class="flex flex-col gap-2 p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto">
            @foreach ($todos as $todo)
                <div class="border p-2 flex flex-col">
                    <p class="capitalize font-medium flex items-center @if($todo->completed) line-through @endif">{{$todo->title}} @if($todo->limit_date) <small class="ml-2 {{$todo->limit_date <= now()->format('Y-m-d') ? 'text-red-500 underline font-bold': 'text-blue-400'}}">{{$todo->limit_date}}</small> @endif </p>
                    <a class="hover:text-blue-600 font-medium text-blue-400" href="{{route('todos.show', $todo)}}">show</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="font-medium text-gray-400">No todo available</p>
        <a href="{{route('todos.create')}}" class="text-blue-400 underline">Add one to begin</a>
    @endif
</div>
@endsection