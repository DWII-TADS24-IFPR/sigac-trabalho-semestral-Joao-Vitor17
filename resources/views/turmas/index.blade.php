@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
    <h1>Turmas</h1>

    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Adicionar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ANO</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <td scope="col">{{ $turma->id }}</td>
                    <td scope="col">{{ $turma->ano }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('turmas.show', $turma->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('turmas.edit', $turma->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar esta turma?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection