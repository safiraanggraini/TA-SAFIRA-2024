<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class PesananController extends Controller
{
    protected $apiUrl;
    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }
    public function index(Request $request)
    {
        $title = 'Pesanan';

        $token = Cookie::get('token');

        $response = Http::withToken($token)->get($this->apiUrl . '/orders');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login')->with('error', 'Gagal mengambil data pengguna.');
        }

        $orders = $response->json('data');
        // dd($orders);
        return view('admin.konten.pesanan', ['title' => $title, 'orders' => $orders]);
    }

    public function isChecked(Request $request, $id)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->post($this->apiUrl . '/orders/' . $id . '/check_order', [
            'checked_by_admin' => 'true',
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Pesanan berhasil diperiksa oleh admin.');
        } else {
            $errors = $response->json();
            $errorMessage = isset($errors['message']) ? $errors['message'] : 'Gagal memeriksa pesanan.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }

}
