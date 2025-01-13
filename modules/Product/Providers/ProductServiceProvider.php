<?php

namespace Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(paths: __DIR__ . "../../Database/Migrations");
        $this->mergeConfigFrom(path: __DIR__ . "../../config.php", key: "product");

        $this->app->register(provider: RouteServiceProvider::class);
    }
}
