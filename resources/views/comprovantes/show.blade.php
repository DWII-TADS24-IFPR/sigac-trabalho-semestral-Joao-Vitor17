@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
    <h1>Detalhes do Comprovante</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">HORAS</th>
                <th scope="col">ATIVIDADE</th>
                <th scope="col">CATEGORIA_ID</th>
                <th scope="col">ALUNO_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $comprovante->id }}</td>
                <td scope="col">{{ $comprovante->horas }}</td>
                <td scope="col">{{ $comprovante->atividade }}</td>
                <td scope="col">{{ $comprovante->categoria_id }}</td>
                <td scope="col">{{ $comprovante->aluno_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes da Categoria deste Comprovante</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">MAXIMO_HORAS</th>
                <th scope="col">CURSO_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $comprovante->categoria->id }}</td>
                <td scope="col">{{ $comprovante->categoria->nome }}</td>
                <td scope="col">{{ $comprovante->categoria->maximo_horas }}</td>
                <td scope="col">{{ $comprovante->categoria->curso_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Aluno deste Comprovante</h1>

    <table class="table table-white">
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
                <td scope="col">{{ $comprovante->aluno->id }}</td>
                <td scope="col">{{ $comprovante->aluno->nome }}</td>
                <td scope="col">{{ $comprovante->aluno->cpf }}</td>
                <td scope="col">{{ $comprovante->aluno->email }}</td>
                <td scope="col">{{ $comprovante->aluno->senha }}</td>
                <td scope="col">{{ $comprovante->aluno->curso_id }}</td>
                <td scope="col">{{ $comprovante->aluno->turma_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('comprovantes.index') }}" class="btn btn-primary">Voltar</a>
@endsection