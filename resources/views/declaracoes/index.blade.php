@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
    <h1>Declarações</h1>

    <a href="{{ route('declaracoes.create') }}" class="btn btn-primary mb-3">Adicionar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">HASH</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($declaracoes as $declaracao)
                <tr>
                    <td scope="col">{{ $declaracao->id }}</td>
                    <td scope="col">{{ $declaracao->hash }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('declaracoes.show', $declaracao->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('declaracoes.edit', $declaracao->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar esta declaração?');">
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