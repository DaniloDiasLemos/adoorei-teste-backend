<?php

namespace App\BoundedContext\Sales\Infrastructure\InBound\Http\Requests;

use App\BoundedContext\Sales\Application\Command\CreateSale\CreateSaleCommand;
use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
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

    public function toCreateCommand(): CreateSaleCommand
    {
        return new CreateSaleCommand(
            amount: $this->input('amount'),
            products: $this->input('products') ?? []
        );
    }
}
