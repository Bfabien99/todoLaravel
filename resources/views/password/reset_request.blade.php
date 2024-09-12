@extends('layout.auth')
@section('title') Request to reset @endsection
@section('content')
<form action="{{route('reset.post')}}" method="post">@csrf
    <small>Make Request to Reset my password</small>
    @if(session()->has('error'))
        <p class="text-red-400" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <span>x</span> {{session('error')}}</p>
    @endif
    @if(session()->has('success'))
        <p class="text-green-500" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{session('success')}}</p>
    @endif
    @if(session()->has('reset-success'))
        <div>
            <p>Check you Mailbox, you receive an email</p>
        </div>
    @else
    <div>
        <label for="email">Email</label>
        <input class="outline-none border p-2" type="email" name="email" placeholder="Enter email" id="email"
            value="{{old('email')}}">
        @error('email')
            <p class="text-red-400"><span class="font-medium">x</span> {{$message}}</p>
        @enderror
    </div>
    <button class="border rounded-sm p-2">Submit</button>
    @endif
</form>
@endsection