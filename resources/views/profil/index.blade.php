@extends('layout.todo')
@section('title') Profil @endsection
@section('content')
<div>
    <p><span>Name: </span> <span>{{auth()->user()->name}}</span></p>
    <p><span>Email: </span> <span>{{auth()->user()->email}}</span></p>
</div>
<div>
    <form action="{{route('profil.email.update')}}" method="post">
        @csrf
        @method('PUT')
        <small>Edit Email</small>
        @if(session()->has('info-error'))
            <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('info-error')}}</p>
        @endif
        @if(session()->has('info-success'))
            <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('info-success')}}</p>
        @endif
        <div>
            <label for="email">New Email</label>
            <input class="outline-none border p-2" type="email" name="email" placeholder="Enter Email" id="email" value="{{old('email')}}">
            @error('email')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <button class="border rounded-sm p-2">Submit</button>
    </form>
</div>
<div>
    <form action="{{route('profil.pass.update')}}" method="post">
        @csrf
        @method('PUT')
        <small>Edit Password</small>
        @if(session()->has('pass-error'))
            <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('pass-error')}}</p>
        @endif
        @if(session()->has('pass-success'))
            <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('pass-success')}}</p>
        @endif
        <div>
            <label for="password">New Password</label>
            <input class="outline-none border p-2" type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="cpassword">Confirm Password</label>
            <input class="outline-none border p-2" type="password" name="password_confirmation" placeholder="Enter password again" id="cpassword">
        </div>
        <button class="border rounded-sm p-2">Submit</button>
    </form>
</div>
@endsection