@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <h1>Categorias</h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Adicionar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td scope="col">{{ $categoria->id }}</td>
                    <td scope="col">{{ $categoria->nome }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('categorias.show', $categoria->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('categorias.edit', $categoria->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar esta categoria?');">
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