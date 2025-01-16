<?php

use Illuminate\Support\Facades\Route;
use Modules\OrderByContext\Checkout\CheckoutController;
use Modules\OrderByContext\Order;

Route::middleware('auth')->group(function () {
    Route::post('checkout', CheckoutController::class)->name('checkout');

    Route::get('orders/{order}', function (Order $order) {
        return $order;
    })->name('orders.show');
});
