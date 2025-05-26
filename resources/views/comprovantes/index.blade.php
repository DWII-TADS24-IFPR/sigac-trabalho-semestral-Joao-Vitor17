@extends('layouts.app')

@section('title', 'Comprovantes')

@section('content')
    <h1>Comprovantes</h1>

    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Adicionar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ATIVIDADE</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($comprovantes as $comprovante)
                <tr>
                    <td scope="col">{{ $comprovante->id }}</td>
                    <td scope="col">{{ $comprovante->atividade }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('comprovantes.show', $comprovante->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('comprovantes.edit', $comprovante->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este comprovante?');">
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