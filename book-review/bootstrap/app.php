<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\ThrottleRequests;
use \App\Http\Middleware\RateLimitMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        //$middleware->append(ThrottleRequests::class);
        $middleware->alias([
            //'throttle' => ThrottleRequests::class,
            'review-book' => \App\Http\Middleware\RateLimitMiddleware::class,
        ]);

        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
