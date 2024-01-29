<?php

namespace App\BoundedContext\Sales\Domain\Repository;

use App\BoundedContext\Sales\Domain\Entity\Sale;

class SaleRepository
{
    public function create(array $fields): Sale
    {
        return Sale::create($fields);
    }

    public function findById(int $id): Sale
    {
        return Sale::findOrFail($id);
    }

    public function deleteById(int $id): int
    {
        return Sale::query()
            ->where("id", $id)
            ->delete();
    }
}
