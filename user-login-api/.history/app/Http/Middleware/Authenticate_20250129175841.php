<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->cookie('user_token');
        if (!$accessToken || !$this->isValidToken($accessToken)) {
            Cookie::queue(Cookie::forgwt('user_token'));

            //return an unauthorized response
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
