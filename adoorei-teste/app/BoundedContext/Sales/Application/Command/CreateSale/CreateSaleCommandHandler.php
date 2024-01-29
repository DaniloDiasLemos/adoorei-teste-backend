<?php

namespace App\BoundedContext\Sales\Application\Command\CreateSale;

use App\BoundedContext\Sales\Domain\Entity\Sale;
use App\BoundedContext\Sales\Domain\Repository\SaleRepository;
use Illuminate\Support\Facades\DB;

class CreateSaleCommandHandler
{
    public function __construct(
        private SaleRepository $saleRepository
    ) {
    }

    public function handle(CreateSaleCommand $command): Sale
    {
        return DB::transaction(fn () => $this->create($command));
    }

    private function create(CreateSaleCommand $command): Sale
    {
        return $this->saleRepository->create([
            'amount' => $command->amount,
            'products' => $command->products
        ]);
    }
}
