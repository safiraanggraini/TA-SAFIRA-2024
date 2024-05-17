<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class PaketWisataController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }

    // Fungsi untuk mendapatkan semua data paket wisata
    public function index()
    {
        $title = 'Paket Wisata';
        $token = Cookie::get('token');

        $response = Http::withToken($token)->get($this->apiUrl . '/products');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login')->with('error', 'Gagal mengambil data paket wisata.');
        }

        $products = $response->json('data');
        // dd($products);
        return view('admin.konten.paket', ['title' => $title, 'products' => $products]);
    }

    // Fungsi untuk menambahkan paket wisata baru
    public function store(Request $request)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->post($this->apiUrl . '/products', [
            'package_name' => $request->input('package_name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Produk telah ditambahkan.');
        } else {
            $errors = $response->json();
            $errorMessage = isset($errors['message']) ? $errors['message'] : 'Gagal menambahkan produk.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    // Fungsi untuk memperbarui data paket wisata
    public function update(Request $request, $id)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->put($this->apiUrl . '/products/update/' . $id, [
            'package_name' => $request->input('package_name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Produk telah diubah.');
        } else {
            $errors = $response->json();
            $errorMessage = isset($errors['message']) ? $errors['message'] : 'Gagal mengubah produk.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    // Fungsi untuk menghapus paket wisata
    public function destroy($id)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->delete($this->apiUrl . '/products/destroy/' . $id);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Produk telah dihapus.');
        } else {
            $errors = $response->json();
            $errorMessage = isset($errors['message']) ? $errors['message'] : 'Gagal menghapus produk.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }
}
