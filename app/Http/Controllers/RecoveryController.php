<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RecoveryCodeMail; // Ubicado en app/Mail/RecoveryCodeMail.php
use App\Models\User;

class RecoveryController extends Controller
{
    // 1) Enviar código
    public function sendCode(Request $request)
    {
        $email = $request->input('email');

        // Verificar si el email existe en tabla users
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No existe un usuario con ese correo.'
            ]);
        }

        // Generar un código aleatorio
        $code = rand(100000, 999999);

        // Guardar o actualizar en password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            ['token' => $code, 'created_at' => now()]
        );

        // Enviar el correo con el código
        Mail::to($email)->send(new RecoveryCodeMail($code));

        return response()->json([
            'success' => true,
            'message' => 'Código enviado, revisa tu correo.'
        ]);
    }

    // 2) Verificar código
    public function verifyCode(Request $request)
    {
        $email = $request->input('email');
        $code  = $request->input('code');

        // Busca en password_resets
        $resetData = DB::table('password_resets')
            ->where('email', $email)
            ->where('token', $code)
            ->first();

        if (!$resetData) {
            return response()->json([
                'success' => false,
                'message' => 'Código inválido o expirado.'
            ]);
        }

        // (Opcional) Revisar si ha expirado
        // if (Carbon::parse($resetData->created_at)->addMinutes(30)->isPast()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'El código ha expirado.'
        //     ]);
        // }

        return response()->json([
            'success' => true,
            'message' => 'Código válido. Procede a cambiar tu contraseña.'
        ]);
    }

    // 3) Restablecer contraseña
    public function resetPassword(Request $request)
    {
        $email       = $request->input('email');
        $newPassword = $request->input('newPassword');

        // Verificar si hay un token de recuperación para ese email
        $resetData = DB::table('password_resets')
            ->where('email', $email)
            ->first();

        if (!$resetData) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró solicitud de recuperación para este correo.'
            ]);
        }

        // Buscar el usuario
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.'
            ]);
        }

        // Actualizar contraseña
        $user->password = Hash::make($newPassword);
        $user->save();

        // Eliminar el token para que no sea reutilizable
        DB::table('password_resets')->where('email', $email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contraseña actualizada correctamente.'
        ]);
    }
}
