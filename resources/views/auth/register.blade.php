@extends('layout.auth')
@section('title') Register @endsection
@section('content')
<form action="" method="post">@csrf
        <small>Register to our page</small>
        @if(session()->has('error'))
        <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('success')}}</p>
        @endif
        <div>
            <label for="name">Fullname</label>
            <input class="outline-none border p-2" type="text" name="name" placeholder="Enter fullname" id="name" value="{{old('name')}}">
            @error('name')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input class="outline-none border p-2" type="email" name="email" placeholder="Enter Email" id="email" value="{{old('email')}}">
            @error('email')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input class="outline-none border p-2" type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="cpassword">Password</label>
            <input class="outline-none border p-2" type="password" name="password_confirmation" placeholder="Enter password again" id="cpassword">
        </div>
        <button class="border rounded-sm p-2">Submit</button>
    </form>
@endsection