<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($verif_user->email)->send(new PasswordReset('route', $verif_user));
        return back()->with(['success' => "Request send...", 'reset-success' => true]);
    }
}
