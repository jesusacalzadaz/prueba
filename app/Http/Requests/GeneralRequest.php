<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class GeneralRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

   

    

    protected function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();
        $error = current($errors);
        $field = key($error);
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => $error[$field]
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
