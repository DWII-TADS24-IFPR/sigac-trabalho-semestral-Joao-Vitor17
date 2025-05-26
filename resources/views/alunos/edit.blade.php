@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar Aluno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alunos.update', $aluno->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">Cpf</label>
            <input type="text" class="form-control" name="cpf" value="{{ $aluno->cpf }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $aluno->email }}" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" value="{{ $aluno->senha }}" required>
        </div>
        
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" @selected($curso->id == $aluno->curso_id)>{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select name="turma_id" class="form-select" required>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" @selected($turma->id == $aluno->turma_id)>{{ $turma->ano }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection