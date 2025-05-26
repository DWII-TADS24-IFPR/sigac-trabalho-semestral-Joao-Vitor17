@extends('layouts.app')

@section('title', 'Editar Comprovante')

@section('content')
    <h1>Editar Comprovante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="horas" class="form-label">Horas</label>
            <input type="number" class="form-control" name="horas" value="{{ $comprovante->horas }}" required>
        </div>
        <div class="mb-3">
            <label for="atividade" class="form-label">Atividade</label>
            <input type="text" class="form-control" name="atividade" value="{{ $comprovante->atividade }}" required>
        </div>
        
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected($categoria->id == $comprovante->categoria_id)>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" @selected($aluno->id == $comprovante->aluno_id)>{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection