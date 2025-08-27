<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\system\Language;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function(){
            Route::middleware('web', 'auth')
                ->prefix('admin')
                ->group(base_path('routes/system/admin.php'));

            Route::middleware('web', 'auth')
                ->prefix('portal')
                ->group(base_path('routes/system/dashboard.php'));

            Route::middleware('web')
                ->group(base_path('routes/system/site.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            Language::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();




    /* ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create(); */
