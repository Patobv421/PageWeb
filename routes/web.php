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
Route::get('/perfil', function () {
    return view('perfil');
});

//nuevas rutaaaaaaaaaas



// Página principal de la tienda
Route::get('/index', function () {
    return view('shop.index');
})->name('shop.index');

// Página de Cardiovascular Drugs
Route::get('/cardiovascular', function () {
    return view('shop.cardiovascular');
})->name('categories.cardiovascular');

// Otras categorías
Route::get('/antimicrobials', function () {
    return view('shop.antimicrobials');
})->name('categories.antimicrobials');

Route::get('/analgesics', function () {
    return view('shop.analgesics');
})->name('categories.analgesics');

Route::get('/psychopharmacological', function () {
    return view('shop.psychopharmacological');
})->name('categories.psychopharmacological');

Route::get('/gastrointestinal', function () {
    return view('shop.gastrointestinal-drugs');
})->name('categories.gastrointestinal');

Route::get('/metabolic', function () {
    return view('shop.metabolic');
})->name('categories.metabolic');

// Otras vistas (favoritos, carrito, etc.)
Route::get('/favorites', function () {
    return view('shop.favorites');
})->name('favorites');

Route::get('/cart', function () {
    return view('shop.cart');
})->name('cart');


// Página principal de la tienda
Route::get('/index', function () {
    return view('shop.index');
})->name('shop.index');

// Página de Cardiovascular Drugs
Route::get('/cardiovascular', function () {
    return view('shop.cardiovascular');
})->name('categories.cardiovascular');

// Página de Antimicrobials
Route::get('/antimicrobials', function () {
    return view('shop.antimicrobials');
})->name('categories.antimicrobials');

// Página de Favoritos
Route::get('/favorites', function () {
    return view('shop.favorites');
})->name('favorites');

// Página del Carrito / Checkout
Route::get('/cart', function () {
    return view('shop.cart');
})->name('cart');

// Otras categorías (ejemplo)
Route::get('/analgesics', function () {
    return view('shop.analgesics');
})->name('categories.analgesics');

Route::get('/psychopharmacological', function () {
    return view('shop.psychopharmacological');
})->name('categories.psychopharmacological');

Route::get('/cardiovascular', function () {
    return view('shop.cardiovascular');
})->name('categories.cardiovascular');

Route::get('/gastrointestinal', function () {
    return view('shop.gastrointestinal-drugs');
})->name('categories.gastrointestinal');

Route::get('/metabolic', function () {
    return view('shop.metabolic');
})->name('categories.metabolic');
