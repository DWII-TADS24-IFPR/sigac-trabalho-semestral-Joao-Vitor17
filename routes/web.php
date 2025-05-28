<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/nivels',[NivelController::class,'index'])->name('nivels.index');
// Route::get('/nivels/create',[NivelController::class,'create']);
// Route::post('/nivels',[NivelController::class,'store'])->name('nivels.store');

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/admin', [AdminController::class,'index'])->name('admin');;
Route::post('/admin/aprovar-documento/{id}', [AdminController::class,'aprovar'])->name('documentos.aprovar');
Route::post('/admin/rejeitar-documento/{id}', [AdminController::class,'rejeitar'])->name('documentos.rejeitar');

Route::get('/aluno', function () {
    return view('aluno');
});

Route::resource('/nivels', NivelController::class);
Route::resource('/cursos', CursoController::class);
Route::resource('/categorias', CategoriaController::class);
Route::resource('/turmas', TurmaController::class);
Route::resource('/documentos', DocumentoController::class);
Route::resource('/alunos', AlunoController::class);
Route::resource('/comprovantes', ComprovanteController::class);
Route::resource('/declaracoes', DeclaracaoController::class);
Route::resource('/eixos', EixoController::class);