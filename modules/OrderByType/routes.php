<?php

use Illuminate\Support\Facades\Route;
use Modules\OrderByType\Models\Order;

Route::middleware('auth')->group(function () {
    Route::get('orders/{order}', function (Order $order) {
        return $order;
    })->name('orders.show');
});
