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

    //     $authToken = session('auth_token');

    //     if (!$authToken) {
    //         return redirect()->route('login'); // o página pública
    //     }

    //     try {
    //         $client = new Client();
    //         $url = 'https://api.lexialegal.site' . '/api/me';

    //         $response = $client->get($url, [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . $authToken,
    //                 'Accept' => 'application/json',
    //             ],
    //         ]);

    //         if ($response->getStatusCode() === 200) {
    //             $userData = json_decode($response->getBody(), true);
    //             $user = new User();
    //             $user->forceFill($userData);
    //             Auth::setUser($user);
    //         }

    //     } catch (\Exception $e) {
    //         return redirect()->route('login');
    //     }

    //     return $next($request);
    // }


        $authToken = session('auth_token');
        if (!$authToken) {
            return redirect()->route('login');

            // return response()->json([
            //     'status_code' => 401,
            //     'message' => 'Token de autorización no proporcionado',
            // ], 401);
        }

        try {
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

            // $payload = json_decode((string) $response->getBody(), true);
            // $apiUser = $payload['data']['user'] ?? $payload['data'] ?? $payload['user'] ?? $payload;
            // if (!$apiUser || empty($apiUser['email'])) {
            //     return response()->json([
            //         'status_code' => 401,
            //         'message' => 'Respuesta inválida del servidor de autenticación'
            //     ], 401);
            // }

            // Auth::setUser($apiUser);
            // $request->setUserResolver(fn () => $apiUser);
            /* Si utilizas el guard web */
            /* Auth::login($apiUser); */

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
