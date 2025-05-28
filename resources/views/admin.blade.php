@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Bem-vindo, Admin</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="{{ route('nivels.index') }}" class="btn btn-primary w-100 p-3">Níveis</a>
            </div>
            <div class="col">
                <a href="{{ route('eixos.index') }}" class="btn btn-primary w-100 p-3">Eixos</a>
            </div>
            <div class="col">
                <a href="{{ route('cursos.index') }}" class="btn btn-primary w-100 p-3">Cursos</a>
            </div>
            <div class="col">
                <a href="{{ route('alunos.index') }}" class="btn btn-primary w-100 p-3">Alunos</a>
            </div>
            <div class="col">
                <a href="{{ route('turmas.index') }}" class="btn btn-primary w-100 p-3">Turmas</a>
            </div>
            <div class="col">
                <a href="{{ route('categorias.index') }}" class="btn btn-primary w-100 p-3">Categorias</a>
            </div>
        </div>

        <div class="mt-5">
            <h2 class="mb-4">📄 Documentos dos Alunos</h2>

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">URL</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documentos as $documento)
                        <tr>
                            <td class="text-center">{{ $documento->id }}</td>
                            <td>
                                <a href="{{ $documento->url }}" target="_blank">Acessar PDF</a>
                            </td>
                            <td>{{ $documento->descricao }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <form action="{{ route('documentos.aprovar', $documento->id) }}" method="POST" onsubmit="return confirm('Deseja realmente aprovar este documento?');">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                                    </form>
                                    <form action="{{ route('documentos.rejeitar', $documento->id) }}" method="POST" onsubmit="return confirm('Deseja realmente rejeitar este documento?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Rejeitar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Nenhum documento encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection