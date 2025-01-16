<?php

declare(strict_types=1);

namespace Modules\OrderByContext\Checkout;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\OrderByContext\Order;
use Modules\Payment\PaymentFailed;

class MarkOrderAsFailed implements ShouldQueue
{
    public function handle(PaymentFailed $event): void
    {
        Order::find($event->order->id)->markAsFailed();
    }
}
