<?php

namespace Modules\OrderByType\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Modules\OrderByType\DTOs\OrderStarted;
use Modules\OrderByType\Notifications\OrderReceived;

class SendOrderConfirmationEmail implements ShouldQueue
{
    public function handle(OrderStarted $event): void
    {
        Mail::to($event->user->email)->send(new OrderReceived($event->order));
    }
}
