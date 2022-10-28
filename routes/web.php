<?php

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Actions\DeleteUnusedImages;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
 *-GUESS: convidat (no identificat), usuari identificat,
 * -VERIFICAT: usuari verificat,
 * ADMIN: editor, administrador i bloquejat
 * fallbackRoute
 */
 //****************** GRUPO DE RUTAS PARA AÑADIR ->middleware('guess') **********************************/
Route::middleware('guess')->group(function(){
    Route::match(['GET', 'POST'], '/anunciosearch', [AnuncioController::class, 'search'])->name('anuncio.search');
    // Route::resource('anuncio', AnuncioController::class);
    Route::get('/anuncio', [AnuncioController::class, 'index'])->name('anuncio.index');
    // Route::get('/anuncio/create', [AnuncioController::class, 'create'])->name('anuncio.create');
    Route::get('/anuncio/show/{anuncio}', [AnuncioController::class, 'show'])->name('anuncio.show');
    // Route::get('/anuncio/delete/{anuncio}', [AnuncioController::class, 'delete'])->name('anuncio.delete');
    // Route::post('/anuncio', [AnuncioController::class, 'store'])->name('anuncio.store');
    // Route::get('/anuncio/{anuncio}/edit', [AnuncioController::class, 'edit'])->name('anuncio.edit');
    // Route::put('/anuncio/{anuncio}', [AnuncioController::class, 'update'])->name('anuncio.update');
    // Route::delete('/anuncio/{anuncio}', [AnuncioController::class, 'destroy'])->name('anuncio.destroy');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'sendMail'])->name('email.contact');

    Route::get('/categorias', [CategoriaController::class, 'categorias'])->name('categorias.anuncios');

});


 //****************** GRUPO DE RUTAS PARA AÑADIR ->middleware('auth) **********************************/
Route::middleware('auth')->group( function(){

    Route::get('/anuncio/create', [AnuncioController::class, 'create'])->name('anuncio.create')->middleware('adult');
    Route::get('/anuncio/delete/{anuncio}', [AnuncioController::class, 'delete'])->name('anuncio.delete');
    Route::post('/anuncio', [AnuncioController::class, 'store'])->name('anuncio.store');
    Route::get('/anuncio/{anuncio}/edit', [AnuncioController::class, 'edit'])->name('anuncio.edit');
    Route::get('/anuncio/editLast', [AnuncioController::class, 'editLast'])->name('anuncio.editLast');
    Route::put('/anuncio/{anuncio}', [AnuncioController::class, 'update'])->name('anuncio.update');
    Route::delete('/anuncio/{anuncio}', [AnuncioController::class, 'destroy'])->name('anuncio.destroy')->middleware('signed');
    // Route::get('/anuncio/cleanBikeDirectory', [ DeleteUnusedImages::class, 'cleanBikeDirectory' ])->name('anuncio.cleanBikeDirectory');
    Route::get('/myanuncios', [AnuncioController::class, 'misMotos'])->name('anuncio.myBikes');
    Route::get('/anuncio/userTrashed/{user}', [AnuncioController::class, 'userTrashedBikes'])->name('userTrashedBikes');
    Route::get('/anuncioRestore/{id}', [AnuncioController::class, 'anuncioRestore'])->name('anuncio.restore');
    Route::delete('/anunciopurge/{id}', [AnuncioController::class, 'purgeBike'])->name('anuncio.purge');

    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.list');
    // Route::get('/trashedUsers', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{user}', [UserController::class, 'update'])->name('user.update');

});

 //****************** GRUPO DE RUTAS PARA AÑADIR ->middleware('auth) **********************************/
Route::prefix('isAdmin')->middleware('auth, admin')->group( function(){
    Route::get('/userRestore/{id}', [UserController::class, 'userRestore'])->name('user.restore');
    Route::delete('/userpurge/{id}', [UserController::class, 'purgeUser'])->name('user.purge');
    Route::get('/trashedUsers', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/role/destroy/{roleid}/{userid}', [UserController::class, 'removeRole'])->name('user.removeRole');
    Route::get('/anuncio/cleanAnuncioDirectory', [ DeleteUnusedImages::class, 'cleanAnuncioDirectory' ])->name('anuncio.cleanBikeDirectory');
    // Route::get('/userRestore/{id}', [UserController::class, 'userRestore'])->name('user.restore');
    // Route::delete('/userpurge/{id}', [UserController::class, 'purgeUser'])->name('user.purge');
    // Route::get('/role/destroy/{roleid}/{userid}', [UserController::class, 'removeRole'])->name('user.removeRole');

    //****************** RUTA OPTIMIZE:CLEAR **********************************/
    Route::get('/clearcache', function() {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return view('components.cachecleared');
    })->name('clearcache')->middleware('isAdmin');

});


//****************** FIN GRUPO **********************************/
/**
 * FALLBACK ROUTE
 */
Route::fallback([WelcomeController::class, 'index']);

// require __DIR__.'/auth.php';
