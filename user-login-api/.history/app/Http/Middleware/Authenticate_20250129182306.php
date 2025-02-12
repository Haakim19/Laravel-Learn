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
        $accessToken = $request->cookie('access_token');
        if (!$accessToken || !$this->isValidToken($accessToken)) {
            Cookie::queue(Cookie::forget('access_token'));

            //return an unauthorized response
            return response()->json(['message' => 'abd'], 401);
        }
        return $next($request);
    }
    protected function isValidToken(string $accessToken): bool
    {
        return true;
    }
}
