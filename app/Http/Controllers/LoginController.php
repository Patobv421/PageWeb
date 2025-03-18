<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RegisterContrller; // Asegúrate de importar el modelo correcto
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');// Asegúrate de que la vista esté en resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Buscar el usuario en la base de datos
        $name = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($name && Hash::check($request->password, $name->password)) {
            Auth::login($name);

            return redirect()->route('homepage')->with('success', 'Welcome back!');
        }

        // Si la autenticación falla, redirigir con un mensaje de error
        return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
