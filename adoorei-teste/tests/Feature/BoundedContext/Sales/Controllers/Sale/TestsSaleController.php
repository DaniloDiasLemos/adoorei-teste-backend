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
    
    protected function sendDeleteRequest(Sale $existingSale): void
    {
        $this
        ->deleteJson(sprintf('/api/sales/%s', $existingSale->id))
        ->assertSuccessful();
    }
    
    protected function sendFindByIdGetRequest(Sale $existingSale): void
    {
        $this
        ->getJson(sprintf('/api/sales/%s', $existingSale->id))
        ->assertSuccessful()
        ->assertJson([
            "id" => $existingSale->id,
            "amount" => $existingSale->amount
        ]);
    }
    
    protected function verifySaleHasBeenCreatedInDataBase(int $saleId)
    {
        $this->assertDatabaseHas('sales', [
            'id' => $saleId,
        ]);
    }
    
    protected function verifySaleHasBeenUpdatedInDataBase(Sale $existingSale, Sale $updatingSale)
    {
        $amount = 0;
        if ($updatingSale->products) {
            foreach ($updatingSale->products as $product) {
                $amount += $product['price'] * $product['amount'];
            }
        }

        $this->assertDatabaseHas('sales', [
            'id' => $existingSale->id,
            'amount' => $amount
        ]);
    }
    
    protected function verifySaleHasBeenDeletedInDataBase(Sale $existingSale)
    {
        $this->assertDatabaseMissing('sales', [
            'id' => $existingSale->id,
        ]);
    }
}