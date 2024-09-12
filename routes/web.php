<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

# Limiter les routes aux personnes non connectés
Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/', 'login')->name('login'); # page de connexion
        Route::post('/', 'handle_login')->name('login.post'); # soumission des données
        Route::get('/register', 'register')->name('register'); # page d'inscription
        Route::post('/register', 'handle_register')->name('register.post'); # soumission des données
    });
});

# Création de route pour notre resource
Route::resource('todos', TodoController::class)->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::controller(ProfilController::class)->group(function(){
        Route::get('/profil', 'index')->name('profil.index'); # page de connexion
        Route::put('/profil/email', 'update_email')->name('profil.email.update'); # soumission des données
        Route::put('/profil/pass', 'update_password')->name('profil.pass.update'); # page d'inscription
        Route::get('/logout', 'logout')->name('profil.logout'); # page d'inscription
    });
});