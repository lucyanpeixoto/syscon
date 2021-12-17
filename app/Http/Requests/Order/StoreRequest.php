<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ValidationTrait;

class StoreRequest extends FormRequest
{
    use ValidationTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client.id' => 'required|exists:clients,id',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer',
        ];
    }
}
