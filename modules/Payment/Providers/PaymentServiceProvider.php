<?php

namespace Modules\Payment\Provider;

use Illuminate\Support\ServiceProvider;
use RouteServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(paths: __DIR__ . "./../Database/Migration");
        $this->mergeConfigFrom(path: __DIR__ . "./../config.php", key: "order");

        $this->app->register(provider: RouteServiceProvider::class);

    }
}
