<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    protected $apiUrl;
    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }

    public function index()
    {
        $title = 'Booking';
        $token = Cookie::get('token');

        $response = Http::withToken($token)->get($this->apiUrl . '/me');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login')->with('error', 'Gagal mengambil data pengguna.');
        }

        $userData = $response->json('data');

        // Ambil data products dari API
        $productsResponse = Http::get($this->apiUrl . '/products');

        if ($productsResponse->failed()) {
            return redirect()->back()->with('error', 'Gagal mengambil data produk.');
        }

        $products = $productsResponse->json('data') ;

        // dd($products);

        return view('booking.index', [
            'userData' => $userData,
            'products' => $products,
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->post($this->apiUrl . '/orders', [
            'product_id' => $request->input('paket_wisata'), // Sesuaikan dengan name pada input form
            'amount' => $request->input('jumlah'), // Sesuaikan dengan name pada input form
            'set_date' => $request->input('check_in'), // Sesuaikan dengan name pada input form
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect('/success')->with('success', $data['message']);        } else {
            $errors = $response->json();
            return redirect()->back()->with('error', $errors['message'] ?? 'Gagal melakukan pemesanan.');
        }
    }

}
