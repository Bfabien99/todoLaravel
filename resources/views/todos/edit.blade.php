@extends('layout.todo')
@section('title') Edit @endsection
@section('content')
<form class="flex flex-col gap-2 p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto"
    action="{{route('todos.update', $todo)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <a href="{{route('todos.show', $todo)}}" class="bg-black p-1 rounded-sm text-white font-medium">< Go Back</a>
    </div>
    <small class="font-medium underline">Edit a Todo</small>
    @if(session()->has('error'))
        <p class="text-white bg-red-400 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <span>x</span> {{session('error')}}</p>
    @endif
    @if(session()->has('success'))
        <p class="text-white bg-green-500 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{session('success')}}</p>
    @endif
    <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="title">Title</label>
        <input class="outline-none border p-2 focus:border-blue-400" type="text" name="title" placeholder="Enter title" id="title"
            value="{{old('title', $todo->title)}}">
        @error('title')
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="detail">Detail</label>
        <textarea class="outline-none border p-2 focus:border-blue-400" name="detail" id="detail"
            placeholder="Some information about the Todo...">{{old('detail', $todo->detail)}}</textarea>
        @error('detail')
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="limit_date">Limit Date</label>
        <input class="outline-none border p-2 focus:border-blue-400" type="date" name="limit_date" id="limit_date"
            value="{{old('limit_date', $todo->limit_date)}}">
        @error('limit_date')
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
        @enderror
    </div>
    <button class="border rounded-sm p-2 hover:bg-blue-400 hover:text-white hover:border-none font-medium">Submit</button>
</form>
@endsection
