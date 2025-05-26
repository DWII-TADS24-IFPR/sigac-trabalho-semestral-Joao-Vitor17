@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
    <h1>Detalhes do Curso</h1>

    <table class="table table-white mb-5">
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
                <td scope="col">{{ $curso->id }}</td>
                <td scope="col">{{ $curso->nome }}</td>
                <td scope="col">{{ $curso->sigla }}</td>
                <td scope="col">{{ $curso->total_horas }}</td>
                <td scope="col">{{ $curso->nivel_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Nível deste Curso</h1>

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $curso->nivel->id }}</td>
                <td scope="col">{{ $curso->nivel->nome }}</td>

            </tr>
        </tbody>
    </table>

    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Voltar</a>
@endsection