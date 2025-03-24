<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RecoveryCodeMail;

class SingleViewRecoveryController extends Controller
{
    public function index(Request $request)
    {
        // Si es GET, mostramos la vista con el "step" tomado de la sesión o, por defecto, step=1
        if ($request->isMethod('get')) {
            $step = session('recovery_step', 1);
            return view('recoverypassword', compact('step'));
        }

        // Si es POST, determinamos el step y ejecutamos la lógica correspondiente
        $step = $request->input('step');

        switch ($step) {
            case 1:
                return $this->handleSendCode($request);
            case 2:
                return $this->handleValidateCode($request);
            case 3:
                return $this->handleChangePassword($request);
            default:
                // Si no coincide, reiniciamos a step=1
                session(['recovery_step' => 1]);
                return redirect()->route('recovery');
        }
    }

    private function handleSendCode(Request $request)
    {
        // Validar el email
        $request->validate([
            'email' => 'required|email'
        ]);

        // Verificar que exista un usuario con ese email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user with that email']);
        }

        // Generar un código de 6 dígitos
        $code = mt_rand(100000, 999999);

        // Guardar el código en la BD (asegúrate de tener la migración y el modelo PasswordCode)
        PasswordCode::create([
            'email' => $request->email,
            'code'  => $code,
            'used'  => false,
        ]);

        // Enviar el correo con el código
        Mail::to($request->email)->send(new RecoveryCodeMail($code));

        // Actualizar la sesión: paso a step=2, guardamos el email y un status
        session([
            'recovery_step'   => 2,
            'recovery_email'  => $request->email,
            'recovery_status' => 'We have sent you a code!'
        ]);

        return redirect()->route('recovery')->with('status', 'Code sent! Check your email');
    }

    private function handleValidateCode(Request $request)
    {
        // Validar que se envíe el código
        $request->validate([
            'code' => 'required'
        ]);

        // Obtener el email desde la sesión
        $email = session('recovery_email');
        if (!$email) {
            session(['recovery_step' => 1]);
            return redirect()->route('recovery')->withErrors(['email' => 'Session expired, go step 1']);
        }

        // Verificar el código en la BD
        $record = PasswordCode::where('email', $email)
                              ->where('code', $request->code)
                              ->where('used', false)
                              ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Invalid code or already used']);
        }

        // Si el código es válido, pasamos a step=3
        session(['recovery_step' => 3]);
        return redirect()->route('recovery')->with('status', 'Code valid, set new password.');
    }

    private function handleChangePassword(Request $request)
    {
        // Validar la nueva contraseña y su confirmación
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $email = session('recovery_email');
        if (!$email) {
            session(['recovery_step' => 1]);
            return redirect()->route('recovery')->withErrors(['email' => 'Session expired.']);
        }

        // Tomar el último código no usado
        $record = PasswordCode::where('email', $email)
                              ->where('used', false)
                              ->orderBy('id', 'desc')
                              ->first();

        if (!$record) {
            session(['recovery_step' => 1]);
            return redirect()->route('recovery')->withErrors(['code' => 'No valid code found.']);
        }

        // Marcar el código como usado
        $record->used = true;
        $record->save();

        // Actualizar la contraseña del usuario
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Limpiar las variables de sesión de recuperación
        session()->forget(['recovery_step', 'recovery_email', 'recovery_status']);

        // Redirigir a la pantalla de login
        return redirect('/login')->with('status', 'Password changed. You can login now!');
    }
}
