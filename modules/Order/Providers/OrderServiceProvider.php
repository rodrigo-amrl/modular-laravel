<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(paths: __DIR__ . "../../Database/Migrations");
        $this->mergeConfigFrom(path: __DIR__ . "../../config.php", key: "order");

        $this->app->register(provider: RouteServiceProvider::class);
        
        $this->loadViewsFrom(__DIR__ . '/../../Ui/Views', 'order');

        Blade::anonymousComponentPath(__DIR__ . '/../../Ui/Views/components', 'order');
        Blade::componentNamespace('Modules\\Order\\Ui\\ViewComponents', 'order');
    }
}
