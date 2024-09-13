<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\Mail\PasswordUpdateNotification;
use App\Models\PasswordResetModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Str;
use Illuminate\Validation\Rules\Password;

class PasswordResetController extends Controller
{
    //
    public function reset_request(){
        return view('password.reset_request');
    }

    public function handle_reset_request(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
        ]);

        $verif_user = User::where(['email' => $validate['email']])->first();
        if(!$verif_user) return back()->withInput()->with('error', 'Unknow user...');

        $token = time().Str::random(20);
        PasswordResetModel::create([
            'token' => $token,
            'email' => $verif_user->email
        ]);
        Mail::to($verif_user->email)->send(new PasswordReset(route('reset.validate', ['token' => $token]), $verif_user));
        return back()->with(['success' => "Request send...", 'reset-success' => true]);
    }

    public function reset_validate(Request $request){
        $token = $request->input('token', '');
        $is_token = PasswordResetModel::where('token', $token)->firstOrFail();
        return view('password.reset_validate');
    }
    
    public function handle_reset_validate(Request $request){
        $token = $request->input('token', '');
        $is_token = PasswordResetModel::where('token', $token)->firstOrFail();

        $verif_user = User::where(['email' => $is_token->email])->first();
        if(!$verif_user) return to_route('register')->withInput()->with('error', 'You have to register first...');

        $validate = $request->validate([
            'password' => ['required', Password::min(6)->uncompromised(), 'confirmed'],
        ]);


        $verif_user->password = $validate['password'];
        $verif_user->update();

        PasswordResetModel::where('email', $is_token->email)->delete();
        Mail::to($verif_user->email)->send(new PasswordUpdateNotification($verif_user));
        return to_route('login')->with('success', 'Password updated...');
    }
}
