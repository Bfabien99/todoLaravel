@extends('layout.todo')
@section('title') Edit @endsection
@section('content')
<form action="{{route('todos.update', $todo)}}" method="post">
        @csrf
        @method('PUT')
        <small>Edit a Todo</small>
        @if(session()->has('error'))
        <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('success')}}</p>
        @endif
        <div>
            <label for="title">Title</label>
            <input class="outline-none border p-2" type="text" name="title" placeholder="Enter title" id="title" value="{{old('title', $todo->title)}}">
            @error('title')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="detail">Detail</label>
            <textarea class="outline-none border p-2" name="detail" id="detail" placeholder="Some information about the Todo...">{{old('detail', $todo->detail)}}</textarea>
            @error('detail')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="limit_date">Limit Date</label>
            <input class="outline-none border p-2" type="date" name="limit_date" id="limit_date" value="{{old('limit_date', $todo->limit_date)}}">
            @error('limit_date')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <button class="border rounded-sm p-2">Submit</button>
    </form>
@endsection