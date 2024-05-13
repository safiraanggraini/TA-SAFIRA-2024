<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function loginProcess(Request $request)
    {
        // Kirim request login ke backend
        $response = Http::post('https://curug-pletuk.fly.dev/auth/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // Cek keberhasilan login dari respons backend
        if ($response->successful()) {
            $data = $response->json();

            // Menyimpan token di localStorage
            $token = $data['data']['token'];
            $user = $data['data']['user'];

            return response()->json($data)
                ->header('Authorization', 'Bearer ' . $token)
                ->header('User-Data', json_encode($user));
        } else {
            // Tanggapan error jika login gagal
            return response()->json(['message' => 'Login failed'], $response->status());
        }
    }
}
