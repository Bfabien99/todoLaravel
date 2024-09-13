@extends('layout.auth')
@section('title') Request to reset @endsection
@section('content')
<form class="flex flex-col gap-2 p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto" action="{{route('reset.post')}}" method="post">@csrf
    <small class="font-medium underline">Make Request to Reset my password</small>
    @if(session()->has('error'))
        <p class="text-white bg-red-400 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <span>x</span> {{session('error')}}</p>
    @endif
    @if(session()->has('success'))
        <p class="text-white bg-green-500 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{session('success')}}</p>
    @endif
    @if(session()->has('reset-success'))
        <div>
            <p>Check you Mailbox, you receive an email</p>
        </div>
    @else
    <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="email">Email</label>
        <input class="outline-none border p-2 focus:border-blue-400" type="email" name="email" placeholder="Enter email" id="email"
            value="{{old('email')}}">
        @error('email')
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
        @enderror
    </div>
    <button class="border rounded-sm p-2 hover:bg-blue-400 hover:text-white hover:border-none font-medium">Submit</button>
    @endif
</form>
@endsection