<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handle_login(Request $request){
    }

    public function register(){
        return view('auth.register');
    }

    public function handle_register(Request $request){
    }
}
