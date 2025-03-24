<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryCodeMail;
use App\Models\User;
use App\Models\PasswordCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordRecoveryController extends Controller
{
    /**
     * Muestra el formulario para ingresar el email.
     */
    public function showEmailForm()
    {
        return view('auth.recovery.email');
    }

    /**
     * Procesa el envío del código al email
     */
    public function sendCode(Request $request)
    {
        // Validamos el email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Verificamos que exista un usuario con ese email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'No user found with that email address.',
            ]);
        }

        // Generamos un código (6 dígitos aleatorios)
        $code = mt_rand(100000, 999999);

        // Guardamos en la tabla password_codes
        PasswordCode::create([
            'email' => $request->email,
            'code'  => $code,
        ]);

        // Enviamos el correo con el código
        Mail::to($request->email)->send(new RecoveryCodeMail($code));

        // Redirigimos a la pantalla para ingresar el código
        // Pasamos el email por la sesión para no perderlo
        session(['email_for_recovery' => $request->email]);

        return redirect()->route('recovery.code.form')
                         ->with('status', 'We have sent you a recovery code!');
    }

    /**
     * Muestra el formulario para ingresar el código
     */
    public function showCodeForm()
    {
        return view('auth.recovery.code');
    }

    /**
     * Procesa la validación del código
     */
    public function checkCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        // Tomamos el email guardado en sesión
        $email = session('email_for_recovery');
        if (!$email) {
            return redirect()->route('recovery.email.form')
                             ->withErrors(['email' => 'No email in session.']);
        }

        // Buscamos un registro que coincida con email, código y no esté usado
        $record = PasswordCode::where('email', $email)
                              ->where('code', $request->code)
                              ->where('used', false)
                              ->first();

        if (!$record) {
            return back()->withErrors([
                'code' => 'Invalid code or already used. Try again.',
            ]);
        }

        // Si es válido, guardamos en sesión para el siguiente paso
        session(['verified_code' => $request->code]);

        // Redirigimos al formulario para cambiar contraseña
        return redirect()->route('recovery.reset.form')
                         ->with('status', 'Code verified, please set new password.');
    }

    /**
     * Muestra el formulario para la nueva contraseña
     */
    public function showResetForm()
    {
        return view('auth.recovery.reset');
    }

    /**
     * Procesa el guardado de la nueva contraseña
     */
    public function resetPassword(Request $request)
    {
        // Validamos contraseña y confirmación
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $email = session('email_for_recovery');
        $code  = session('verified_code');

        if (!$email || !$code) {
            return redirect()->route('recovery.email.form')
                             ->withErrors(['email' => 'Session expired or invalid.']);
        }

        // Marcamos el código como usado
        $record = PasswordCode::where('email', $email)
                              ->where('code', $code)
                              ->where('used', false)
                              ->first();

        if (!$record) {
            return redirect()->route('recovery.email.form')
                             ->withErrors(['email' => 'Invalid password reset attempt.']);
        }

        $record->used = true;
        $record->save();

        // Actualizamos la contraseña del usuario
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Limpiamos la sesión
        session()->forget(['email_for_recovery', 'verified_code']);

        // Redirigimos al login
        return redirect('/login')->with('status', 'Your password has been reset! You can now login.');
    }
}
