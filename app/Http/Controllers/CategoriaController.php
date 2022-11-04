<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Anuncio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Concesionario;

class CategoriaController
{
    public function index( Request $request )
    {
        $request->validate([
            'nombre' => 'required|max:30',
         ]);

         $categoria = Categoria::where('nombre', 'like', $request->input('nombre'))->firstOrFail();

        $anuncios = Anuncio::with('user')->where( "categoria_id", "LIKE", $categoria->id )->get();
        $total = count($anuncios);
        $anuncios = Anuncio::where( "categoria_id", "LIKE", $categoria->id )->orderBy('id', 'ASC')->paginate(12)->appends(['name'=> $categoria->name ]);

         return view('anuncios.list', ['anuncios' => $anuncios, 'total' => $total, 'categoria' => $categoria, 'name' => $categoria->name ]);
    }
}
