<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SingleViewRecoveryController;

// Página principal
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta protegida (ejemplo)
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage')->middleware('auth');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::view('register', 'register')->name('register');

// ****** RUTA PRINCIPAL PARA EL FLUJO SINGLE-VIEW DE RECUPERACIÓN DE CONTRASEÑA ******  
// Solo se usa este controlador para recuperar la contraseña en 3 pasos.
Route::match(['get','post'], '/recovery', [SingleViewRecoveryController::class, 'index'])
     ->name('recovery');

// Ruta para vaciar la sesión (útil en pruebas)
Route::get('/debug-flush-session', function() {
    session()->flush(); // Elimina toda la información de sesión
    return 'Sesión vaciada. Vuelve a /recovery para iniciar en step=1';
});
