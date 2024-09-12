<form action="{{route('reset.validate.post', ['token' => request('token')])}}" method="post">
        @csrf
        @method('PUT')
        <small>Set New Password</small>
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