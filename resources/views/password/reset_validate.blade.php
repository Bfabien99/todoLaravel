<form class="flex flex-col gap-2 p-4 bg-white shadow-sm rounded-sm w-full max-w-[500px] mx-auto" action="{{route('reset.validate.post', ['token' => request('token')])}}" method="post">
        @csrf
        @method('PUT')
        <small class="font-medium underline">Set New Password</small>
        @if(session()->has('pass-error'))
            <p class="text-white bg-red-400 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"><span>x</span> {{session('pass-error')}}</p>
        @endif
        @if(session()->has('pass-success'))
            <p class="text-white bg-green-500 p-1 w-fit rounded-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">{{session('pass-success')}}</p>
        @endif
        <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="password">New Password</label>
            <input class="outline-none border p-2 focus:border-blue-400" type="password" name="password" placeholder="Enter password" id="password">
            @error('password')
                <p class="text-white bg-red-400 p-1 w-fit rounded-sm"><span class="font-medium">x</span> {{$message}}</p>
            @enderror
        </div>
        <div class="flex flex-col w-full gap-1 my-2">
        <label class="font-medium text-lg" for="cpassword">Confirm Password</label>
            <input class="outline-none border p-2 focus:border-blue-400" type="password" name="password_confirmation" placeholder="Enter password again" id="cpassword">
        </div>
        <button class="border rounded-sm p-2 hover:bg-blue-400 hover:text-white hover:border-none font-medium">Submit</button>
    </form>