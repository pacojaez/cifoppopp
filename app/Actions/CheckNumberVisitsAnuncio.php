<?php

namespace App\Http\Actions;

use App\Models\Anuncio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CheckNumberVisitsAnuncio extends Controller
{

    public function check( Anuncio $anuncio ){

        return $anuncio->visitas;
    }

}
