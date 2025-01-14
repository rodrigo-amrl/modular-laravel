<?php

namespace Modules\Payment\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(paths: __DIR__ . "../../Database/Migrations");
        $this->mergeConfigFrom(path: __DIR__ . "../../config.php", key: "payment");

        $this->app->register(provider: RouteServiceProvider::class);

    }
}
