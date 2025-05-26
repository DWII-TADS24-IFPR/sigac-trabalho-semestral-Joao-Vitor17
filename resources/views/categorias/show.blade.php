@extends('layouts.app')

@section('title', 'Detalhes da Categoria')

@section('content')
    <h1>Detalhes da Categoria</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">MAXIMO_HORAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $categoria->id }}</td>
                <td scope="col">{{ $categoria->nome }}</td>
                <td scope="col">{{ $categoria->maximo_horas }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Curso desta Categoria</h1>

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">SIGLA</th>
                <th scope="col">TOTAL_HORAS</th>
                <th scope="col">NIVEL_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $categoria->curso->id }}</td>
                <td scope="col">{{ $categoria->curso->nome }}</td>
                <td scope="col">{{ $categoria->curso->sigla }}</td>
                <td scope="col">{{ $categoria->curso->total_horas }}</td>
                <td scope="col">{{ $categoria->curso->nivel_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Voltar</a>
@endsection