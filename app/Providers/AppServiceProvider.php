<?php

namespace App\Providers;

use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\ComprovanteRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\DeclaracaoRepositoryInterface;
use App\Repositories\Contracts\DocumentoRepositoryInterface;
use App\Repositories\Contracts\NivelRepositoryInterface;
use App\Repositories\Contracts\TurmaRepositoryInterface;
use App\Repositories\Eloquent\AlunoRepository;
use App\Repositories\Eloquent\CategoriaRepository;
use App\Repositories\Eloquent\ComprovanteRepository;
use App\Repositories\Eloquent\CursoRepository;
use App\Repositories\Eloquent\DeclaracaoRepository;
use App\Repositories\Eloquent\DocumentoRepository;
use App\Repositories\Eloquent\NivelRepository;
use App\Repositories\Eloquent\TurmaRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NivelRepositoryInterface::class, NivelRepository::class);
        $this->app->bind(CursoRepositoryInterface::class, CursoRepository::class);
        $this->app->bind(CategoriaRepositoryInterface::class, CategoriaRepository::class);
        $this->app->bind(TurmaRepositoryInterface::class, TurmaRepository::class);
        $this->app->bind(DocumentoRepositoryInterface::class, DocumentoRepository::class);
        $this->app->bind(AlunoRepositoryInterface::class, AlunoRepository::class);
        $this->app->bind(ComprovanteRepositoryInterface::class, ComprovanteRepository::class);
        $this->app->bind(DeclaracaoRepositoryInterface::class, DeclaracaoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
