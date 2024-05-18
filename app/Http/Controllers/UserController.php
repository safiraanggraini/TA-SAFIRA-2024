<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    protected $apiUrl;
    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }
    public function index()
    {
        $title = 'User';

        $token = Cookie::get('token');

        $response = Http::withToken($token)->get($this->apiUrl . '/users');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login')->with('error', 'Gagal mengambil data pengguna.');
        }

        $users = $response->json('data');

        return view('admin.konten.user', ['title' => $title, 'users' => $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
