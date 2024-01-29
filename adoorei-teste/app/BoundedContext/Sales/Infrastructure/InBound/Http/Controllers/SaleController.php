<?php

namespace App\BoundedContext\Sales\Infrastructure\InBound\Http\Controllers;

use App\BoundedContext\Sales\Application\Command\CreateSale\CreateSaleCommandHandler;
use App\BoundedContext\Sales\Application\Command\UpdateSale\UpdateSaleCommandHandler;
use App\BoundedContext\Sales\Domain\Entity\Sale;
use App\BoundedContext\Sales\Domain\Repository\SaleRepository;
use App\BoundedContext\Sales\Infrastructure\InBound\Http\Requests\CreateSaleRequest;
use App\BoundedContext\Sales\Infrastructure\InBound\Http\Requests\UpdateSaleRequest;
use Illuminate\Http\Request;

class SaleController
{
    public function __construct(
        private readonly SaleRepository $saleRepository,
        private readonly CreateSaleCommandHandler $createSaleCommandHandler,
        private readonly UpdateSaleCommandHandler $updateSaleCommandHandler
    )
    {}

    public function paginate()
    {
        return [];
    }

    public function create(CreateSaleRequest $request): Sale
    {
        return $this->createSaleCommandHandler->handle($request->toCreateCommand());
    }
    
    public function update(int $saleId, UpdateSaleRequest $request): Sale
    {
        return $this->updateSaleCommandHandler->handle($request->toUpdateCommand($saleId));
    }
}
