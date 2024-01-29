<?php

namespace App\BoundedContext\Sales\Domain\EntityFactory;

use App\BoundedContext\Sales\Domain\Entity\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     * 
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'description' => $this->faker->paragraph(),
        ];
    }
}
