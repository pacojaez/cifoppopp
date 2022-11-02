<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfertaStoreRequest extends FormRequest
{
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
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
    * @return array<string, mixed>
     */
    public function rules(): array
    {

        return [
            'texto' =>'required|max:255',
            'importe' =>'required|numeric',
            'vigencia' => 'required'
        ];
    }
}
