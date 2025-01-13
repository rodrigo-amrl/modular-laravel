<?php

namespace Modules\Shipment\Providers;

use Illuminate\Support\ServiceProvider;

class ShipmentServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(paths: __DIR__ . "../../Database/Migrations");
        $this->mergeConfigFrom(path: __DIR__ . "../../config.php", key: "order");

        $this->app->register(provider: RouteServiceProvider::class);

    }
}
