<?php

namespace Modules\Order\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Modules\Order\DTOs\OrderStarted;
use Modules\Order\Notifications\OrderReceived;

class SendOrderConfirmationEmail implements ShouldQueue
{
    public function handle(OrderStarted $event): void
    {
        Mail::to($event->user->email)->send(new OrderReceived($event->order));
    }
}
