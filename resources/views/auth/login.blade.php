@extends('layout.auth')
@section('title') Login @endsection
@section('content')
<form class="flex flex-col gap-2 p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto" action="" method="post">@csrf
        <small class="font-medium underline">Login to our page</small>
        @if(session()->has('error'))
        <p class="text-white bg-red-400 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p class="text-white bg-green-500 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('success')}}</p>
        @endif
        <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="email">Email</label>
            <input class="outline-none border p-2 focus:border-blue-400" type="email" name="email" placeholder="Enter Email" id="email" value="{{old('email')}}">
            @error('email')
                <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="password">Password</label>
            <input class="outline-none border p-2 focus:border-blue-400" type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <a href="{{route('reset')}}" class="text-blue-400 hover:underline">Forget password ?</a>
        <button class="border rounded-sm p-2 hover:bg-blue-400 hover:text-white hover:border-none font-medium">Submit</button>
    </form>
@endsection