<?php

namespace App\BOundedContext\Sales\Domain\EntityFactory;

use App\BoundedContext\Sales\Domain\Entity\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     * 
     * @return array
     */

     public function definition()
     {
        return [
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'products' => []
        ];
     }
}