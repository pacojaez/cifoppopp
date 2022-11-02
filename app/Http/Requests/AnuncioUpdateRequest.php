<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AnuncioUpdateRequest extends AnuncioCreateRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

   /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->anuncio->id;
        return [
            //TODO: si queremos que la imagen sea única añadir una regla aqui
        ]+parent::rules();
    }
}
