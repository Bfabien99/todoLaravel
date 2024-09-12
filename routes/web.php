<?php

use App\Http\Controllers\AuthController;
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
