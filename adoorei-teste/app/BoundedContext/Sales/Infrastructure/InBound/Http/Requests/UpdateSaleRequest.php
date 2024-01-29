<?php

namespace App\BoundedContext\Sales\Infrastructure\InBound\Http\Requests;

use App\BoundedContext\Sales\Application\Command\CreateSale\CreateSaleCommand;
use App\BoundedContext\Sales\Application\Command\UpdateSale\UpdateSaleCommand;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */

    public function rules()
    {
        return [
            'amount' => 'numeric|required',
            'products' => 'array|nullable'
        ];
    }

    public function toUpdateCommand(int $saleId): UpdateSaleCommand
    {
        return new UpdateSaleCommand(
            saleId: $saleId,
            amount: $this->input('amount'),
            products: $this->input('products') ?? []
        );
    }
}
