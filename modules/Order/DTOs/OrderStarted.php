<?php

namespace Modules\Order\DTOs;

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
