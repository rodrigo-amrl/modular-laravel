<?php

namespace Modules\Order\Tests\Models;

use Modules\Order\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{

    public function test_it_creates_an_order()
    {
        $order = new Order();
        $this->assertInstanceOf(Order::class, $order);
    }
}
