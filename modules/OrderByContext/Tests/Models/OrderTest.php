<?php

namespace Modules\OrderByContext\Tests\Models;

use Modules\OrderByContext\Order;
use Modules\OrderByContext\Tests\OrderTestCase;

class OrderTest extends OrderTestCase
{
    public function test_it_creates_an_order(): void
    {
        $order = new Order();

        $this->assertTrue(true);
    }
}
