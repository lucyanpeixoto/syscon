<?php 

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait ValidationTrait
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(httpResponse($validator->errors(), 'Validation errors', false, 400));
    }
}
