<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $authToken = session('auth_token');
        $expiresAt   = session('auth_expires_at');
        if (!$authToken) {
            return redirect()->route('login');
        }

        try {
            // Revisar si el token está vencido o a punto de expirar
            if ($expiresAt && now()->greaterThanOrEqualTo($expiresAt)) {

                $client = new Client();
                $urlRefresh = env('URL_API', 'https://api.lexialegal.site') . '/api/refresh';
                $refreshResponse = $client->post($urlRefresh, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $authToken,
                        'Accept' => 'application/json',
                    ],
                ]);
                if ($refreshResponse->getStatusCode() === 200) {
                    $data = json_decode($refreshResponse->getBody(), true);

                    // Guardar el nuevo token y expiración
                    session([
                        'auth_token'      => $data['access_token'],
                        'auth_expires_at' => now()->addSeconds($data['expires_in']), // ajusta según tu API
                    ]);

                    $authToken = $data['access_token']; // actualizamos variable
                } else {
                    return redirect()->route('login');
                }
            }

            $client = new Client();
            $url = env('URL_API', 'https://api.lexialegal.site') . '/api/me';

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

            $userData = json_decode($response->getBody(), true);
                $user = new User();
                $user->forceFill($userData);
                Auth::setUser($user);
        }
        catch (\Exception $e) {
            Log::error('Error en AuthMiddleware: ' . $e->getMessage());
            // return redirect()->route('login');

            return response()->json([
                'status_code' => 401,
                'message' => 'Token inválido o sesión expirada',
            ], 401);
        }

        return $next($request);
    }
}
