<?php

namespace App\BoundedContext\Sales\Domain\Entity;

use App\BOundedContext\Sales\Domain\EntityFactory\SaleFactory;
use App\Common\Casts\CastType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property float $amount 
 * @property array $products 
 */

class Sale extends Model
{
    public $fillable = [
        'amount',
        'products'
    ];

    protected $casts = [
        "products" => CastType::JSON
    ];

    public static function factory(): SaleFactory
    {
        return SaleFactory::new();
    }
}
