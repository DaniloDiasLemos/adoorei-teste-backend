<?php

namespace Tests\Feature\BoundedContext\Sales\Controllers\Sale;

use App\BoundedContext\Sales\Domain\Entity\Sale;

trait TestsSaleController
{
    protected function makeSale(array $fields = []): Sale
    {
        return Sale::factory()->make($fields);
    }
    
    protected function createSale(array $fields = []): Sale
    {
        return Sale::factory()->create($fields);
    }

    protected function sendCreatePostRequest(Sale $sale): int
    {
        return $this
        ->postJson('/api/sales', $sale->getAttributes())
        ->assertSuccessful()
        ->json('id');
    }
    
    protected function sendUpdatePutRequest(Sale $existingSale, Sale $updatingSale): void
    {
        $this
        ->putJson(sprintf('/api/sales/%s', $existingSale->id) , $updatingSale->getAttributes())
        ->assertSuccessful();
    }
    
    protected function verifySaleHasBeenCreatedInDataBase(int $saleId)
    {
        $this->assertDatabaseHas('sales', [
            'id' => $saleId,
        ]);
    }
    
    protected function verifySaleHasBeenUpdatedInDataBase(Sale $existingSale, Sale $updatingSale)
    {
        $this->assertDatabaseHas('sales', [
            'id' => $existingSale->id,
            'amount' => $updatingSale->amount
        ]);
    }
}