@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <h1>Documentos</h1>

    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Adicionar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td scope="col">{{ $documento->id }}</td>
                    <td scope="col">{{ $documento->descricao }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('documentos.show', $documento->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            @if ($documento->status == 'analise')
                                <form action="{{ route('documentos.edit', $documento->id) }}" method="get">
                                    <button type="submit" class="btn btn-info">Editar</button>
                                </form>
                            @endif
                            
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este documento?');">
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