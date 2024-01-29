<?php

namespace App\tests\Feature\BoundedContext\Sales\Controllers\Sale;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\tests\Feature\BoundedContext\Sales\Controllers\Sale\TestsSaleController;
use Tests\Feature\BoundedContext\Sales\Controllers\Sale\TestsSaleController as SaleTestsSaleController;

class SaleControllerIntegrationTest extends TestCase
{
    use DatabaseMigrations;
    use SaleTestsSaleController;

    public function test_should_create()
    {
        $sale = $this->makeSale(['products' => [
            [
                'product_id' => 1,
                'nome' => 'Celular 1',
                'price' => 1800,
                'amount' => 1
            ],
            [
                'product_id' => 2,
                'nome' => 'Celular 2',
                'price' => 3200,
                'amount' => 2
            ]
        ]]);
        $createdSaleId = $this->sendCreatePostRequest($sale);
        $this->verifySaleHasBeenCreatedInDataBase($createdSaleId);
    }
    
    public function test_should_update()
    {
        $existingSale = $this->createSale();
        $updatingSale = $this->makeSale(['products' => [
            [
                'product_id' => 1,
                'nome' => 'Celular 1',
                'price' => 1800,
                'amount' => 1
            ],
            [
                'product_id' => 2,
                'nome' => 'Celular 2',
                'price' => 3200,
                'amount' => 2
            ]
        ]]);
        $this->sendUpdatePutRequest($existingSale, $updatingSale);
        $this->verifySaleHasBeenUpdatedInDataBase($existingSale, $updatingSale);
    }
    
    public function test_should_delete()
    {
        $existingSale = $this->createSale();
        $this->sendDeleteRequest($existingSale);
        $this->verifySaleHasBeenDeletedInDataBase($existingSale);
    }
    
    public function test_should_find_by_id()
    {
        $existingSale = $this->createSale();
        $this->sendFindByIdGetRequest($existingSale);
    }
}