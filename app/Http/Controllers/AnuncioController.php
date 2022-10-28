<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::with('user')->with('categoria')->withCount('ofertas')->orderBy('id', 'ASC')->paginate(12);
        // $bikes = Anuncio::orderBy('id', 'ASC')->paginate(12);
        $total = Anuncio::count();

        return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total]);
    }
}
