<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioCreateRequest extends FormRequest
{
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
            'titulo' =>'required|max:255',
            'descripcion' =>'required|max:255',
            'image' => 'sometimes|file|image|mimes:jpg,gif,png,webp|max:2048',
            'categoria' => 'required'
        ];
    }

    public function messages()
        {
        return [
        'titulo.required' => 'Debes poner el título del Anuncio',
        'descripcion.required' => 'Debes ponerle una descripción',
        'categoria.required' => 'Debes elegir una categoria',
        ];
        }
}
