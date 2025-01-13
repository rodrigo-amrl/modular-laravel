<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Models\Order;

Route::middleware('auth')->group(function () {
    Route::get('orders/{order}', function (Order $order) {
        return $order;
    })->name('orders.show');
});
