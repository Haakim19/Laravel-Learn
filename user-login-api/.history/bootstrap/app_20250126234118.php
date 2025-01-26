<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([Authenticate::class]);
        $middleware->api([
            EnsureFrontendRequestsAreStateful::class,
        ]);
        $middleware->web([
            EnsureFrontendRequestsAreStateful::class,
            EncryptCookies::class,
            // StartSession::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
