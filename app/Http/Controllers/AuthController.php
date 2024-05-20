<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }

    public function indexLogin()
    {
        $title = 'Login';
        return view('auth.login', ['title' => $title]);
    }

    public function indexRegister()
    {
        $title = 'Register';
        return view('auth.register', ['title' => $title]);
    }

    public function loginProcess(Request $request)
    {
        // Kirim request login ke backend
        $response = Http::post($this->apiUrl . '/auth/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
    
        if ($response->successful()) {
            $data = $response->json();
    
            $token = $data['data']['token'];
            $user = $data['data']['user'];
    
            Cookie::queue('token', $token, 30 * 60 * 1000);
            Cookie::queue('user_data', json_encode($user), 30 * 60 * 1000);
    
            return response()->json($data)
                ->header('Authorization', 'Bearer ' . $token)
                ->header('User-Data', json_encode($user));
        } else {
            // Ambil pesan error dari respons
            $errorData = $response->json();
            $errorMessage = isset($errorData['message']) ? $errorData['message'] : 'Login failed';
    
            return response()->json(['message' => $errorMessage], $response->status());
        }
    }
    

    public function logout()
    {
        Cookie::queue(Cookie::forget('token'));

        return redirect()->route('auth.login');
    }

    public function registerProcess(Request $request)
    {
        $response = Http::post($this->apiUrl . '/auth/signup', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            "role_id" => "2"
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->route('auth.login')->with('success', $data['message']);
        } else {
            $errors = $response->json()['message'];

            if ($errors)
                return redirect()->route('auth.register')->with('failed', $errors);
            return redirect()->route('auth.register')->with('failed', 'Terjadi kesalahan. Silahkan coba lagi.');
        }
    }
}
