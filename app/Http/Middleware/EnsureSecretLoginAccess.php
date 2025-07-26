<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSecretLoginAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->query('access_token'); // Ambil token dari query string
        if ($token !== env('SECRET_ACCESS_TOKEN')) {
            abort(403, 'Unauthorized access');
        }
        return $next($request);
    }
}
