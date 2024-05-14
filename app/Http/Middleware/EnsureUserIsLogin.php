<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class EnsureUserIsLogin
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
        $apiUrl = env('API_URL');
        $token = $request->header('Authorization') ?: Cookie::get('token');

        if (!$token) {
            return redirect()->route('auth.login');
        }

        $response = Http::withToken($token)->get($apiUrl .  '/me');

        if ($response->failed() || !$response->json('data')) {
            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
