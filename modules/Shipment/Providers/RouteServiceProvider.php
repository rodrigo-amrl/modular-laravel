<?php

namespace Modules\Shipment\Providers;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ProvidersRouteServiceProvider
{

    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->as('Shipment::')
                ->group(callback: __DIR__ . "../../routes.php");
        });
    }
}
