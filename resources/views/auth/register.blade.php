@extends('layout.auth')
@section('title') Register @endsection
@section('content')
<form action="" method="post">@csrf
        <small>Register to our page</small>
        @if(session()->has('error'))
        <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p>{{session('success')}}</p>
        @endif
        <div>
            <label for="name">Fullname</label>
            <input type="text" name="name" placeholder="Enter fullname" id="name" value="{{old('name')}}">
            @error('name')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter Email" id="email" value="{{old('email')}}">
            @error('email')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="cpassword">Password</label>
            <input type="password" name="password_confirmation" placeholder="Enter password again" id="cpassword">
        </div><button>Submit</button>
    </form>
@endsection