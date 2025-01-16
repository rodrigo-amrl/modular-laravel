<?php

namespace Modules\OrderByContext\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use Modules\OrderByContext\Checkout\MarkOrderAsFailed;
use Modules\OrderByContext\Checkout\NotifyUserOfPaymentFailure;
use Modules\OrderByContext\Checkout\OrderStarted;
use Modules\OrderByContext\Checkout\SendOrderConfirmationEmail;
use Modules\OrderByContext\CompleteOrder;
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
