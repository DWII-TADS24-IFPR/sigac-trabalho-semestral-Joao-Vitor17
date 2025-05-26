@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
    <h1>Detalhes da Turma</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ANO</th>
                <th scope="col">CURSO_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $turma->id }}</td>
                <td scope="col">{{ $turma->ano }}</td>
                <td scope="col">{{ $turma->curso_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Curso desta Turma</h1>

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
                <td scope="col">{{ $turma->curso->id }}</td>
                <td scope="col">{{ $turma->curso->nome }}</td>
                <td scope="col">{{ $turma->curso->sigla }}</td>
                <td scope="col">{{ $turma->curso->total_horas }}</td>
                <td scope="col">{{ $turma->curso->nivel_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('turmas.index') }}" class="btn btn-primary">Voltar</a>
@endsection