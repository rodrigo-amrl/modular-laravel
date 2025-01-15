<?php

namespace Modules\Order\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use Modules\Payment\PaymentFailed;
use Modules\Payment\PaymentSucceeded;
use Modules\Payment\PayOrder;

class EventServiceProvider extends BaseEventServiceProvider
{
    protected $listen = [
        OrderStarted::class => [
            SendOrderConfirmationEmail::class,
        ],
        PaymentSucceeded::class => [
            CompleteOrder::class,
        ],
        PaymentFailed::class => [
            MarkOrderAsFailed::class,
            NotifyUserOfPaymentFailure::class,
        ]
    ];
}
