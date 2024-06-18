<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class EnsureIsCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apiUrl    = env('API_URL');
        $token     = $request->header('Authorization') ?: Cookie::get('token');
        $user_data = Cookie::get('user_data');

        if (!$token) {
            return redirect()->route('auth.login');
        }

        $response = Http::withToken($token)->get($apiUrl .  '/me');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login');
        }

        $userData = $response->json('data');

        if ($user_data) {
            $user_data = json_decode($user_data);
            if (strtolower($user_data->role) == 'admin') {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
