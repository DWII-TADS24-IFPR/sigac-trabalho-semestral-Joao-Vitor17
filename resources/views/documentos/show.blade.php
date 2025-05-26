@extends('layouts.app')

@section('title', 'Detalhes da Documento')

@section('content')
    <h1>Detalhes do Documento</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">URL</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">HORAS_IN</th>
                <th scope="col">STATUS</th>
                <th scope="col">COMENTARIO</th>
                <th scope="col">HORAS_OUT</th>
                <th scope="col">CATEGORIA_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $documento->id }}</td>
                <td scope="col">{{ $documento->url }}</td>
                <td scope="col">{{ $documento->descricao }}</td>
                <td scope="col">{{ $documento->horas_in }}</td>
                <td scope="col">{{ $documento->status }}</td>
                <td scope="col">{{ $documento->comentario }}</td>
                <td scope="col">{{ $documento->horas_out }}</td>
                <td scope="col">{{ $documento->categoria_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes da Categoria deste Documento</h1>

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">maximo_horas</th>
                <th scope="col">curso_id</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $documento->categoria->id }}</td>
                <td scope="col">{{ $documento->categoria->maximo_horas }}</td>
                <td scope="col">{{ $documento->categoria->curso_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('documentos.index') }}" class="btn btn-primary">Voltar</a>
@endsection