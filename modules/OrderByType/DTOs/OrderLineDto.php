<?php

namespace Modules\OrderByType\DTOs;

use Illuminate\Database\Eloquent\Collection;
use Modules\OrderByType\OrderLine;

readonly class OrderLineDto
{
    public function __construct(
        public int $productId,
        public int $productPriceInCents,
        public int $quantity
    ) {
    }

    public static function fromEloquentModel(OrderLine $orderLine): self
    {
        return new self($orderLine->product_id, $orderLine->product_price_in_cents, $orderLine->quantity);
    }

    /**
     * @return \Modules\OrderByType\DTOs\OrderLineDto[]
     */
    public static function fromEloquentCollection(Collection $orderLines): array
    {
        return $orderLines->map(fn (OrderLine $orderLine) => self::fromEloquentModel($orderLine))->all();
    }
}
