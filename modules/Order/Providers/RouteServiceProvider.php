<?php

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ProvidersRouteServiceProvider
{

    public function boot()
    {
        Route::middleware(middleware: 'web')
            ->group(callback: __DIR__ . "/../routes.php");
    }
}
