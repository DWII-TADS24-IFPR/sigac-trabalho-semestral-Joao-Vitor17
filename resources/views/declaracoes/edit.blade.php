@extends('layouts.app')

@section('title', 'Editar Declaração')

@section('content')
    <h1>Editar Declaração</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="hash" class="form-label">Hash</label>
            <input type="text" class="form-control" name="hash" value="{{ $declaracao->hash }}" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" value="{{ $declaracao->data }}" required>
        </div>
        
        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" @selected($aluno->id == $declaracao->aluno_id)>{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="comprovante_id" class="form-label">Comprovante</label>
            <select name="comprovante_id" class="form-select" required>
                @foreach($comprovantes as $comprovante)
                    <option value="{{ $comprovante->id }}" @selected($comprovante->id == $declaracao->comprovante_id)>{{ $comprovante->atividade }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection