@extends('layouts.app')

@section('title', 'Níveis')

@section('content')
    <h1>Niveis</h1>

    <a href="{{ route('nivels.create') }}" class="btn btn-primary mb-3">Adicionar</a>

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
            @foreach($nivels as $nivel)
                <tr>
                    <td scope="col">{{ $nivel->id }}</td>
                    <td scope="col">{{ $nivel->nome }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('nivels.show', $nivel->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('nivels.edit', $nivel->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('nivels.destroy', $nivel->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este nível?');">
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