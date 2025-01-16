<?php

namespace Modules\OrderByContext\Checkout;

use Modules\OrderByContext\Contracts\OrderDto;
use Modules\OrderByContext\Contracts\PendingPayment;
use Modules\User\UserDto;

readonly class OrderStarted
{
    public function __construct(
        public OrderDto $order,
        public UserDto $user,
        public PendingPayment $pendingPayment,
    ) {
    }
}
