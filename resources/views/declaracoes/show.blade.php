@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
    <h1>Detalhes da Declaração</h1>

    <table class="table table-white mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">HASH</th>
                <th scope="col">DATA</th>
                <th scope="col">ALUNO_ID</th>
                <th scope="col">COMPROVANTE_ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $declaracao->id }}</td>
                <td scope="col">{{ $declaracao->hash }}</td>
                <td scope="col">{{ $declaracao->data }}</td>
                <td scope="col">{{ $declaracao->aluno_id }}</td>
                <td scope="col">{{ $declaracao->comprovante_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Aluno desta Declaração</h1>

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
                <td scope="col">{{ $declaracao->aluno->id }}</td>
                <td scope="col">{{ $declaracao->aluno->nome }}</td>
                <td scope="col">{{ $declaracao->aluno->cpf }}</td>
                <td scope="col">{{ $declaracao->aluno->email }}</td>
                <td scope="col">{{ $declaracao->aluno->senha }}</td>
                <td scope="col">{{ $declaracao->aluno->curso_id }}</td>
                <td scope="col">{{ $declaracao->aluno->turma_id }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Detalhes do Comprovante desta Declaração</h1>

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
                <td scope="col">{{ $declaracao->comprovante->id }}</td>
                <td scope="col">{{ $declaracao->comprovante->horas }}</td>
                <td scope="col">{{ $declaracao->comprovante->atividade }}</td>
                <td scope="col">{{ $declaracao->comprovante->categoria_id }}</td>
                <td scope="col">{{ $declaracao->comprovante->aluno_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">Voltar</a>
@endsection