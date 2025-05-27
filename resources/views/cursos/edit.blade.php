@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <h1>Editar Curso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.update', $curso, $curso->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $curso->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" class="form-control" name="sigla" value="{{ $curso->sigla }}" required>
        </div>
        <div class="mb-3">
            <label for="total_horas" class="form-label">Total de horas</label>
            <input type="number" class="form-control" name="total_horas" value="{{ $curso->total_horas }}" required>
        </div>
        
        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nivel</label>
            <select name="nivel_id" class="form-select" required>
                @foreach($nivels as $nivel)
                    <option value="{{ $nivel->id }}" @selected($nivel->id == $curso->nivel_id)>
                        {{ $nivel->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <select name="eixo_id" class="form-select" required>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}" @selected($eixo->id == $curso->eixo_id)>
                        {{ $eixo->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection