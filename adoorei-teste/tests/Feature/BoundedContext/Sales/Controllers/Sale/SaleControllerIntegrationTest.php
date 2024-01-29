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
        $sale = $this->makeSale();
        $createdSaleId = $this->sendCreatePostRequest($sale);
        $this->verifySaleHasBeenCreatedInDataBase($createdSaleId);
    }
    
    public function test_should_update()
    {
        $existingSale = $this->createSale();
        $updatingSale = $this->makeSale();
        $this->sendUpdatePutRequest($existingSale, $updatingSale);
        $this->verifySaleHasBeenUpdatedInDataBase($existingSale, $updatingSale);
    }
}