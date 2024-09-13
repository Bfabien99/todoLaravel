@extends('layout.todo')
@section('title') Details @endsection
@section('content')
<div class="flex flex-col max-w-screen-lg mx-auto">
    <div class="mx-auto">
        @if(session()->has('error'))
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show"
                x-init="setTimeout(() => show = false, 2000)"><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
            <p class="text-white bg-green-500 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show"
                x-init="setTimeout(() => show = false, 2000)">{{session('success')}}</p>
        @endif
    </div>
    <h3 class="text-center text-lg font-medium p-2">Detail</h3>
    <div class="relative flex flex-col gap-2 p-4 bg-white shadow-sm @if ($todo->completed) shadow-green-200 @endif rounded-sm w-full max-w-[500px] mx-auto">
        @if ($todo->completed)
        <p class="absolute self-center top-[20%] text-green-500 font-bold text-8xl opacity-30">done</p>
        @endif
        <p class="flex justify-between gap-2"><span class="grow">Todo:</span> <span>{{$todo->title}}</span></p>
        <p class="flex justify-between gap-2"><span class="grow">Completed:</span> <span>{{$todo->completed ? 'Yes' : 'No'}}</span></p>
        <p class="flex justify-between gap-2"><span class="grow">Limit:</span> <span class="ml-2 {{$todo->limit_date && $todo->limit_date <= now()->format('Y-m-d') ? 'text-red-500 underline font-bold': 'text-blue-400'}}">{{$todo->limit_date ? $todo->limit_date : 'Not defined'}}</span></p>
        <p class="flex justify-between gap-2">
            <span class="grow">Detail:</span>
            <span class="text-justify">
                {{$todo->detail}}
            </span>
        </p>
    </div>
    <div class="flex flex-wrap gap-4 items-center p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto">
        <div class="flex gap-4">
            @if ($todo->completed)
                <a class="text-orange-400 font-medium border rounded-sm p-2 hover:text-white hover:bg-orange-400" href="{{route('todos.undone', $todo)}}">Undone</a>
            @else
                <a class="text-green-500 font-medium border rounded-sm p-2 hover:text-white hover:bg-green-500" href="{{route('todos.complete', $todo)}}">Complete</a>
                <a class="text-blue-400 font-medium border rounded-sm p-2 hover:text-white hover:bg-blue-400" href="{{route('todos.edit', $todo)}}">Update</a>
            @endif
        </div>
        <form action="{{route('todos.destroy', $todo)}}" method="post" id="actionForm">
            @csrf
            @method('DELETE')
            <button class="border rounded-sm p-2 text-red-400">Delete</button>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('actionForm').addEventListener('submit', (event) => {
    event.preventDefault();

    Swal.fire({
        title: "Do you really want to delete this ToDo?",
        icon: "question",
        iconHtml: "?",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        showCancelButton: true,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });
});

    </script>
@endsection