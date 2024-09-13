<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

# Rediriger l'utilisateur
Route::get('/', function(){
    if(auth()->user()) return to_route('todos.index');
    if(!auth()->user()) return to_route('login');
})->name('home');

# route ne nécessitant pas d'être authentifié
Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/login', 'login')->name('login'); # page de connexion
        Route::post('/login', 'handle_login')->name('login.post'); # soumission des données
        Route::get('/register', 'register')->name('register'); # page d'inscription
        Route::post('/register', 'handle_register')->name('register.post'); # soumission des données
    });

    Route::controller(PasswordResetController::class)->group(function(){
        Route::get('/reset', 'reset_request')->name('reset');
        Route::post('/reset', 'handle_reset_request')->name('reset.post');
        Route::get('/reset-validate', 'reset_validate')->name('reset.validate');
        Route::put('/reset-validate', 'handle_reset_validate')->name('reset.validate.post');
    });
});

# Création de route pour notre resource
Route::resource('todos', TodoController::class)->middleware('auth');

# routes nécessitant la connexion
Route::middleware('auth')->group(function(){
    Route::controller(ProfilController::class)->group(function(){
        Route::get('/profil', 'index')->name('profil.index');
        Route::put('/profil/email', 'update_email')->name('profil.email.update');
        Route::put('/profil/pass', 'update_password')->name('profil.pass.update');
        Route::get('/logout', 'logout')->name('profil.logout');
    });

    Route::controller(TodoController::class)->group(function(){
        Route::get('complete/{todo}', 'complete_todo')->name('todos.complete');
        Route::get('undo/{todo}', 'undone_todo')->name('todos.undone');
    });
});