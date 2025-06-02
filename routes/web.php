<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\GerarDeclaracaoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlunoMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [AdminController::class,'index'])->name('admin');;
    Route::post('/admin/aprovar-documento/{id}', [AdminController::class,'aprovar'])->name('documentos.aprovar');
    Route::post('/admin/rejeitar-documento/{id}', [AdminController::class,'rejeitar'])->name('documentos.rejeitar');

    Route::resource('/nivels', NivelController::class);
    Route::resource('/cursos', CursoController::class);
    Route::resource('/categorias', CategoriaController::class);
    Route::resource('/turmas', TurmaController::class);
    Route::resource('/alunos', AlunoController::class);
    Route::resource('/comprovantes', ComprovanteController::class);
    Route::resource('/declaracoes', DeclaracaoController::class);
    Route::resource('/eixos', EixoController::class);
});

Route::middleware(['auth', AlunoMiddleware::class])->group(function () {
    Route::resource('/documentos', DocumentoController::class);
    Route::get('/aluno', function () {
        return view('aluno');
    })->name('aluno');
    Route::get('/relatorios', [GerarDeclaracaoController::class, 'emitirDeclaracao'])->name('declaracao.emitir');    
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

require __DIR__.'/auth.php';
