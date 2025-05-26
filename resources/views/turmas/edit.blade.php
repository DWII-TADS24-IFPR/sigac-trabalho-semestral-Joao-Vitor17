@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')
    <h1>Editar Turma</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('turmas.update', $turma->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" name="ano" value="{{ $turma->ano }}" required>
        </div>
        
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" @selected($curso->id == $turma->curso_id)>
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection