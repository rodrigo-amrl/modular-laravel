<?php

declare(strict_types=1);

namespace Modules\OrderByContext\Tests\Checkout;

use Illuminate\Support\Facades\Event;
use Modules\OrderByContext\Checkout\OrderStarted;
use Modules\OrderByContext\Checkout\SendOrderConfirmationEmail;
use Modules\Payment\PayOrder;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderStartedTest extends TestCase
{
    #[Test]
    public function it_has_listeners(): void
    {
        Event::fake();

        Event::assertListening(OrderStarted::class, SendOrderConfirmationEmail::class);
        Event::assertListening(OrderStarted::class, PayOrder::class);
    }
}
