<?php

// use (como los imports de Java)
use App\Http\Controllers\MainController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

// defino las rutas
// 1 - página principal
Route::get('/', [MainController::class, 'main'])-> name('main');

// 2 - ruta login
Route::get('login', [MainController::class, 'login'])-> name('login');

// 3 - ruta logout
Route::get('logout', [MainController::class, 'logout'])-> name('logout');

// 5: 7 rutas
Route::resource('pokemon', PokemonController::class);