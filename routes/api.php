<?php

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ruta que nos da las categorias
Route::get('/categorias', function(){
    $json = json_encode( Categoria::select( 'nombre', 'id' )->get());
    return response($json)->header('Content-Type', 'application/json');
})->name('categorias');
