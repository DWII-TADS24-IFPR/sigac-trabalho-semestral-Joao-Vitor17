@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
    <h1>Editar Categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria, $categoria->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $categoria->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="maximo_horas" class="form-label">Maximo de horas</label>
            <input type="number" class="form-control" name="maximo_horas" value="{{ $categoria->maximo_horas }}" required>
        </div>
        
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" @selected($curso->id == $categoria->curso_id)>
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection