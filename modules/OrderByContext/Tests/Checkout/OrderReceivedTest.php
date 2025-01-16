<?php

declare(strict_types=1);

namespace Modules\OrderByContext\Tests\Checkout;

use Modules\OrderByContext\Checkout\OrderReceived;
use Modules\OrderByContext\Contracts\OrderDto;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderReceivedTest extends TestCase
{
    #[Test]
    public function it_renders_the_mailable(): void
    {
        $orderDto = new OrderDto(
            id: 1,
            totalInCents: 99_00,
            localizedTotal: '$99.00',
            url: route('order::orders.show', 1),
            lines: []
        );

        $orderReceived = new OrderReceived($orderDto);

        $this->assertIsString($orderReceived->render());
    }
}
