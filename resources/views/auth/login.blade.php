@extends('layout.auth')
@section('title') Login @endsection
@section('content')
<form action="" method="post">@csrf
        <small>Login to our page</small>
        @if(session()->has('error'))
        <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p>{{session('success')}}</p>
        @endif
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
        </div><button>Submit</button>
    </form>
@endsection