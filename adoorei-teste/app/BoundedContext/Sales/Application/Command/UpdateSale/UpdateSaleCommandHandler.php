<?php

namespace App\BoundedContext\Sales\Application\Command\UpdateSale;

use App\BoundedContext\Sales\Domain\Entity\Sale;
use App\BoundedContext\Sales\Domain\Repository\SaleRepository;
use Illuminate\Support\Facades\DB;

class UpdateSaleCommandHandler
{
    public function __construct(
        private SaleRepository $saleRepository
    ) {
    }

    public function handle(UpdateSaleCommand $command): Sale
    {
        return DB::transaction(fn () => $this->update($command));
    }

    private function update(UpdateSaleCommand $command): Sale
    {
        $sale = $this->saleRepository->findById($command->saleId);

        $amount = 0;

        $products = json_decode($command->products);

        if ($products) {
            foreach ($products as $product) {
                $amount += $product->price * $product->amount;
            }
        }

        $sale->fill([
            'amount' => $amount,
            'products' => $products ?? []
        ]);

        $sale->save();

        return $sale;
    }
}
