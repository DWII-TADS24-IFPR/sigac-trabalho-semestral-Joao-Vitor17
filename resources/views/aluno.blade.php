@extends('layouts.app')

@section('title', 'Area do Aluno')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Bem-vindo, Aluno</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="{{ route('alunos.create') }}" class="btn btn-primary w-100 p-3">Criar Aluno</a>
            </div>
            <div class="col">
                <a href="{{ route('documentos.index') }}" class="btn btn-primary w-100 p-3">Documentos</a>
            </div>
            <div class="col">
                <a href="{{ route('declaracao.emitir') }}" class="btn btn-primary w-100 p-3">Gerar Declaração</a>
            </div>
        </div>
    </div>
@endsection