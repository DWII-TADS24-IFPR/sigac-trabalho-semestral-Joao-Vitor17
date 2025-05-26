@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <h1>Cursos</h1>

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Adicionar</a>

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
            @foreach($cursos as $curso)
                <tr>
                    <td scope="col">{{ $curso->id }}</td>
                    <td scope="col">{{ $curso->nome }}</td>
                    <td scope="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('cursos.show', $curso->id) }}" method="get">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>

                            <form action="{{ route('cursos.edit', $curso->id) }}" method="get">
                                <button type="submit" class="btn btn-info">Editar</button>
                            </form>
                            
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este curso?');">
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