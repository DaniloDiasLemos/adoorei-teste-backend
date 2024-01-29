<?php

namespace App\BoundedContext\Sales\Application\Command\CreateSale;

class CreateSaleCommand
{
    public function __construct(
        public readonly float $amount,
        public readonly ?string $products
    )
    {}
}