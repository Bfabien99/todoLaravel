@extends('layout.todo')
@section('title') Edit @endsection
@section('content')
<form action="{{route('todos.update', $todo)}}" method="post">
        @csrf
        @method('PUT')
        <small>Edit a Todo</small>
        @if(session()->has('error'))
        <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p>{{session('success')}}</p>
        @endif
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Enter title" id="title" value="{{old('title', $todo->title)}}">
            @error('title')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" placeholder="Some information about the Todo...">{{old('detail', $todo->detail)}}</textarea>
            @error('detail')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="limit_date">Limit Date</label>
            <input type="date" name="limit_date" id="limit_date" value="{{old('limit_date', $todo->limit_date)}}">
            @error('limit_date')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div><button>Submit</button>
    </form>
@endsection