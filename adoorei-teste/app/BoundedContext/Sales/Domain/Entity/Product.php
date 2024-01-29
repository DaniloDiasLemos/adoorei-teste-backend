<?php

namespace App\BoundedContext\Sales\Domain\Entity;

use App\BoundedContext\Sales\Domain\EntityFactory\ProductFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name 
 * @property float price 
 * @property string description 
 */

class Product extends Model
{
    public $fillable = [
        'name',
        'price',
        'description',
    ];

    public static function factory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
