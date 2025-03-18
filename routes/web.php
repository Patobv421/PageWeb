<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});


Route::get('/login', function () {
    return view('login'); // Laravel buscará el archivo login.blade.php en resources/views
})->name('login'); // Agregamos el nombre de la ruta

Route::view('recoverypassword', 'recoverypassword')->name('recoverypassword');
Route::view('register', 'register')->name('register');


use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta protegida para después del login
Route::get('/homepage', function () {
    return view('homepage'); // Asegúrate de tener esta vista en resources/views/dashboard.blade.php
})->name('homepage')->middleware('auth');