@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
    <h1>Criar Curso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" class="form-control" name="sigla" required>
        </div>
        <div class="mb-3">
            <label for="total_horas" class="form-label">Total de horas</label>
            <input type="number" class="form-control" name="total_horas" required>
        </div>
        
        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nivel</label>
            <select name="nivel_id" class="form-select" required>
                <option value="">Selecione um nível</option>
                @foreach($nivels as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <select name="eixo_id" class="form-select" required>
                <option value="">Selecione um eixo</option>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}">{{ $eixo->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection