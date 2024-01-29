<?php

namespace App\BoundedContext\Sales\Infrastructure\InBound\Http\Controllers;

use App\BoundedContext\Sales\Domain\Entity\Product;

class ProductController
{
    public function paginate()
    {
        return Product::get()->all();
    }
}
