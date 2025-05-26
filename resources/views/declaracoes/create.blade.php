@extends('layouts.app')

@section('title', 'Criar Declaração')

@section('content')
    <h1>Criar Declaração</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('declaracoes.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="hash" class="form-label">Hash</label>
            <input type="text" class="form-control" name="hash" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" required>
        </div>
        
        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                <option value="">Selecione um Aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="comprovante_id" class="form-label">Comprovante</label>
            <select name="comprovante_id" class="form-select" required>
                <option value="">Selecione um Comprovante</option>
                @foreach($comprovantes as $comprovante)
                    <option value="{{ $comprovante->id }}">{{ $comprovante->atividade }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection