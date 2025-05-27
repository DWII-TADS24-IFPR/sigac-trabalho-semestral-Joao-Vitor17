@extends('layouts.app')

@section('title', 'Eixos')

@section('content')
    <h1>Eixos</h1>

    <a href="{{ route('eixos.create') }}" class="btn btn-primary mb-3">Adicionar</a>

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
            @foreach($eixos as $eixo)
                <tr>
                    <td scope="col">{{ $eixo->id }}</td>
                    <td scope="col">{{ $eixo->nome }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('eixos.show', $eixo->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('eixos.edit', $eixo->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('eixos.destroy', $eixo->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este eixo?');">
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