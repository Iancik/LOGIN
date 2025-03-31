<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Asigură-te că middleware-ul de autentificare este înregistrat
        $middleware->web(append: [
            // middleware-uri web suplimentare dacă este necesar
        ]);
        
        $middleware->alias([
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            // alte aliasuri de middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
