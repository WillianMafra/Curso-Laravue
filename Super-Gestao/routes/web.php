<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos']);
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);

// Usando o método prefix para definir o prefixo no get e o metodo group para definir as rotas que serão agrupadas
Route::prefix('/app')->group( function() {
    Route::get('/login', [\App\Http\Controllers\ContatoController::class, 'login']);
    Route::get('/clientes', [\App\Http\Controllers\ContatoController::class, 'clientes']);
    Route::get('/fornecedores', [\App\Http\Controllers\ContatoController::class, 'fornecedores']);
    Route::get('/produtos', [\App\Http\Controllers\ContatoController::class, 'produtos']);
});

Route::get('/contato/{nome}/{idade}', function( string $nome = 'Desconhecido', int $idade = 0) {
    echo 'Nome: '.$nome . ' Idade: ' . $idade; 
})->where('idade', '[0-9]+')->where('nome', '[A-Za-z]+');
// Metódo where utilizado para validacão de dados recebidos pelo Get