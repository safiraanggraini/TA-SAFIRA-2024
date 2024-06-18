<?php

namespace App\Http\Controllers;

// Mengimpor kelas Controller dari Laravel
use App\Http\Controllers\Controller;

// Mengimpor kelas Request dari Laravel untuk menangani HTTP request
use Illuminate\Http\Request;

// Mengimpor kelas Cookie dari Laravel untuk menangani cookie
use Illuminate\Support\Facades\Cookie;

// Mengimpor kelas Http dari Laravel untuk melakukan HTTP request
use Illuminate\Support\Facades\Http;

// Mendefinisikan kelas AuthController yang merupakan turunan dari Controller
class AuthController extends Controller
{
    // Mendefinisikan properti apiUrl untuk menyimpan URL API
    protected $apiUrl;

    // Konstruktor untuk inisialisasi nilai properti apiUrl
    public function __construct()
    {
        // Mengambil URL API dari environment variable atau menggunakan nilai default
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }

    // Fungsi untuk menampilkan halaman login
    public function indexLogin()
    {
        // Mendefinisikan judul halaman login
        $title = 'Login';

        // Mengembalikan tampilan halaman login dengan judul yang sudah ditentukan
        return view('auth.login', ['title' => $title]);
    }

    // Fungsi untuk menampilkan halaman registrasi
    public function indexRegister()
    {
        // Mendefinisikan judul halaman registrasi
        $title = 'Register';

        // Mengembalikan tampilan halaman registrasi dengan judul yang sudah ditentukan
        return view('auth.register', ['title' => $title]);
    }

    // Fungsi untuk memproses login
    public function loginProcess(Request $request)
    {
        // Mengirim request login ke backend dengan email dan password dari input
        $response = Http::post($this->apiUrl . '/auth/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
    
        // Mengecek apakah respons dari backend sukses
        if ($response->successful()) {
            // Mengambil data dari respons JSON
            $data = $response->json();
    
            // Mengambil token dan data pengguna dari respons
            $token = $data['data']['token'];
            $user = $data['data']['user'];
    
            // Menyimpan token dan data pengguna dalam cookie
            Cookie::queue('token', $token, 30 * 60 * 1000);
            Cookie::queue('user_data', json_encode($user), 30 * 60 * 1000);
    
            // Mengembalikan respons JSON dengan token dan data pengguna di header
            return response()->json($data)
                ->header('Authorization', 'Bearer ' . $token)
                ->header('User-Data', json_encode($user));
        } else {
            // Mengambil pesan error dari respons
            $errorData = $response->json();
            $errorMessage = isset($errorData['message']) ? $errorData['message'] : 'Login failed';
    
            // Mengembalikan respons JSON dengan pesan error dan status kode dari respons
            return response()->json(['message' => $errorMessage], $response->status());
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        // Menghapus cookie token
        Cookie::queue(Cookie::forget('token'));

        // Mengarahkan kembali ke halaman login
        return redirect()->route('auth.login');
    }

    // Fungsi untuk memproses registrasi
    public function registerProcess(Request $request)
    {
        // Mengirim request registrasi ke backend dengan data pengguna dari input
        $response = Http::post($this->apiUrl . '/auth/signup', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            "role_id" => "2"
        ]);

        // Mengecek apakah respons dari backend sukses
        if ($response->successful()) {
            // Mengambil data dari respons JSON
            $data = $response->json();
            
            // Mengarahkan kembali ke halaman login dengan pesan sukses
            return redirect()->route('auth.login')->with('success', $data['message']);
        } else {
            // Mengambil pesan error dari respons
            $errors = $response->json()['message'];

            // Mengarahkan kembali ke halaman registrasi dengan pesan error
            if ($errors)
                return redirect()->route('auth.register')->with('failed', $errors);

            // Pesan error default jika tidak ada pesan error spesifik
            return redirect()->route('auth.register')->with('failed', 'Terjadi kesalahan. Silahkan coba lagi.');
        }
    }
}
