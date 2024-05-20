<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    protected $apiUrl;
    public function __construct()
    {
        $this->apiUrl = env('API_URL') ?? 'https://curug-pletuk.fly.dev';
    }

    public function index(Request $request)
    {
        $title = 'Profile';
        $token = Cookie::get('token');

        $response = Http::withToken($token)->get($this->apiUrl . '/me');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login')->with('error', 'Gagal mengambil data pengguna.');
        }

        $userOrderResponse = Http::withToken($token)->get($this->apiUrl . '/check_user_order');

        if ($userOrderResponse->failed()) {
            console . log($userOrderResponse);
        }

        $userOrder = $userOrderResponse->json('data');

        $userData = $response->json('data');
        // dd($userOrder);
        return view('profile.index', ['userData' => $userData, 'userOrder' => $userOrder, 'title' => $title]);
    }

    public function update(Request $request, $id)
    {
        $token = Cookie::get('token');
        $userData = json_decode(Cookie::get('user_data'));
    
        $requestData = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
        ];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $response = Http::withToken($token)
                            ->attach('image', file_get_contents($image), $image->getClientOriginalName())
                            ->put($this->apiUrl . '/users/update_profile', $requestData);
        } else {
            $response = Http::withToken($token)
                            ->put($this->apiUrl . '/users/update_profile', $requestData);
        }
    
        if ($response->successful()) {
            $data = $response->json();
    
            $updatedUserData = array_merge((array) $userData, $data['data']);
    
            Cookie::queue('user_data', json_encode($updatedUserData), 30 * 60 * 1000);
    
            return redirect()->back()->with('success', $data['message']);
        } else {
            $errors = $response->json();
            $errorMessage = isset($errors['message']) ? $errors['message'] : 'Gagal memperbarui profil.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }
    

    public function changePassword(Request $request, $id)
    {
        $token = Cookie::get('token');

        $response = Http::withToken($token)->put($this->apiUrl . '/users/update_password', [
            'current_password' => $request->input('current_password'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->back()->with('success', $data['message']);
        } else {
            $errors = $response->json();
            return redirect()->back()->with('error', $errors['message']);
        }
    }

    public function destroy($id)
    {

    }
}
