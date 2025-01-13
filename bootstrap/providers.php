<?php

use Modules\Order\Providers\OrderServiceProvider;
use Modules\Product\Providers\ProductServiceProvider;
use Modules\Shipment\Providers\ShipmentServiceProvider;
use Modules\Payment\Providers\PaymentServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    OrderServiceProvider::class,
    PaymentServiceProvider::class,
    ShipmentServiceProvider::class,
    ProductServiceProvider::class
];
