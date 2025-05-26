@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h1>Detalhes do Aluno</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">CPF</th>
                <th scope="col">EMAIL</th>
                <th scope="col">SENHA</th>
                <th scope="col">CURSO_ID</th>
                <th scope="col">TURMA_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $aluno->id }}</td>
                <td scope="col">{{ $aluno->nome }}</td>
                <td scope="col">{{ $aluno->cpf }}</td>
                <td scope="col">{{ $aluno->email }}</td>
                <td scope="col">{{ $aluno->senha }}</td>
                <td scope="col">{{ $aluno->curso_id }}</td>
                <td scope="col">{{ $aluno->turma_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Curso deste Aluno</h1>

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
                <td scope="col">{{ $aluno->curso->id }}</td>
                <td scope="col">{{ $aluno->curso->nome }}</td>
                <td scope="col">{{ $aluno->curso->sigla }}</td>
                <td scope="col">{{ $aluno->curso->total_horas }}</td>
                <td scope="col">{{ $aluno->curso->nivel_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes da Turma deste Aluno</h1>

        <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ANO</th>
                <th scope="col">CURSO_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $aluno->turma->id }}</td>
                <td scope="col">{{ $aluno->turma->ano }}</td>
                <td scope="col">{{ $aluno->turma->curso_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('alunos.index') }}" class="btn btn-primary">Voltar</a>
@endsection