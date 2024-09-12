<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handle_login(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if(Auth::attempt($validate)){
            #$user = User::where('email', $validate['email'])->firstOrFail();
            #Auth::login($user);
            return to_route('todos.index');
        }
    }

    public function register(){
        return view('auth.register');
    }

    public function handle_register(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(6)->uncompromised(), 'confirmed'],
            'name' => 'required|min:2|max:50'
        ]);

        User::create($validate);
        return to_route('login')->with('success', 'Registered succesfuly... login now!');
    }
}
