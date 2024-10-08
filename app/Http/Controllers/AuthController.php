<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

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
        if(Auth::attempt($validate)) return to_route('todos.index');
        return back()->with('error', 'Invalid credentials...');
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

        Mail::to($validate['email'])->send(new MailSender());
        return to_route('login')->with('success', 'Registered succesfuly... login now!');
    }
}
