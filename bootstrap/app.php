<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\TenantAuthMiddleware;
use App\Http\Middleware\TenantGuestMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'tenantAuth' =>  TenantAuthMiddleware::class,
            'tenantGuest' =>TenantGuestMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
