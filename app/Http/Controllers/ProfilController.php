<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ProfilController extends Controller
{
    public function index(){
        return view('profil.index');
    }

    public function update_email(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        $validate = $request->validate([
            'email' => 'required|email',
        ]);

        $verif_user = User::where(['email' => $validate['email']])->first();
        if($verif_user && $verif_user->id != $user->id) return back()->with('info-error', 'Email already in use...')->withInput();

        $user->email = $validate['email'];
        $user->update();

        return back()->with('info-success', 'Email updated...');
    }

    public function update_password(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        $validate = $request->validate([
            'password' => ['required', Password::min(6)->uncompromised(), 'confirmed'],
        ]);

        $user->password = $validate['password'];
        $user->update();

        return back()->with('pass-success', 'Password updated...');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->regenerate();
        return to_route('login')->with('success', 'Logout... See you later!');
    }
}
