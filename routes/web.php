<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SingleViewRecoveryController;
use App\Http\Controllers\DoctorController; // Importación faltante

// Página principal
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta protegida (requiere autenticación)
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage')->middleware('auth');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta principal para el flujo de recuperación de contraseña (en 3 pasos)
Route::match(['get', 'post'], '/recovery', [SingleViewRecoveryController::class, 'index'])
     ->name('recovery');

// routes/web.php
Route::get('/doctors', function () {
    return view('doctors'); // Esto carga la vista doctors.blade.php
})->name('doctors');
    

// Ruta para vaciar la sesión (útil en pruebas)
Route::get('/debug-flush-session', function () {
    session()->flush(); // Elimina toda la información de sesión
    return 'Sesión vaciada. Vuelve a /recovery para iniciar en step=1';
});

Route::get('/shop', function () {
    return view('shop');
});
