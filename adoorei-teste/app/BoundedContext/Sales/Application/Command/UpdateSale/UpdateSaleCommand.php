<?php

namespace App\BoundedContext\Sales\Application\Command\UpdateSale;

class UpdateSaleCommand
{
    public function __construct(
        public readonly int $saleId,
        public readonly float $amount,
        public readonly ?string $products
    ) {
    }
}
