<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session('_token'));
        $authToken = session('_token');

        // dd($authToken);

        if (!$authToken) {
            return response()->json([
                'status_code' => 401,
                'message' => 'Token de autorización no proporcionado',
            ], 401);
        }

        try {
            $client = new Client();
            $url = env('URL_API', 'https://api.lexialegal.site') . '/';

            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $authToken,
                    'Accept'        => 'application/json',
                ],
                'timeout' => 5,
            ]);

            if ($response->getStatusCode() !== 200) {
                return response()->json([
                    'status_code' => 401,
                    'message' => 'Usuario no autorizado',
                ], 401);
            }

        } catch (\Exception $e) {
            Log::error('Error en AuthMiddleware: ' . $e->getMessage());
            return response()->json([
                'status_code' => 401,
                'message' => 'Token inválido o sesión expirada',
            ], 401);
        }

        return $next($request);
    }
}
