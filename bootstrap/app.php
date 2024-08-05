<?php

use App\Http\Middleware\AdminSystemMiddleware;
use App\Http\Middleware\CheckAccountMiddleware;
use App\Http\Middleware\DirectorMiddleware;
use App\Http\Middleware\OnlyDoctorMiddleware;
use App\Http\Middleware\RedirectMemberDashboardMiddleware;
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
        $middleware->alias([
            'admin.system' => AdminSystemMiddleware::class,
            'director' => DirectorMiddleware::class,
            'check_account_activated' => CheckAccountMiddleware::class,
            'redirect.member' => RedirectMemberDashboardMiddleware::class,
            'only.doctor' => OnlyDoctorMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
