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
            <p><span>x</span> {{session('info-error')}}</p>
        @endif
        @if(session()->has('info-success'))
            <p>{{session('info-success')}}</p>
        @endif
        <div>
            <label for="email">New Email</label>
            <input type="email" name="email" placeholder="Enter Email" id="email" value="{{old('email')}}">
            @error('email')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <button>Submit</button>
    </form>
</div>
<div>
    <form action="{{route('profil.pass.update')}}" method="post">
        @csrf
        @method('PUT')
        <small>Edit Password</small>
        @if(session()->has('pass-error'))
            <p><span>x</span> {{session('pass-error')}}</p>
        @endif
        @if(session()->has('pass-success'))
            <p>{{session('pass-success')}}</p>
        @endif
        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Enter password again" id="cpassword">
        </div>
        <button>Submit</button>
    </form>
</div>
@endsection