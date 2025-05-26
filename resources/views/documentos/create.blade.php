@extends('layouts.app')

@section('title', 'Criar Documento')

@section('content')
    <h1>Criar Documento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" class="form-control" name="url" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" required>
        </div>
        <div class="mb-3">
            <label for="horas_in" class="form-label">Horas_in</label>
            <input type="number" class="form-control" name="horas_in" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" required>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <input type="text" class="form-control" name="comentario" required>
        </div>
        <div class="mb-3">
            <label for="horas_out" class="form-label">Horas_out</label>
            <input type="number" class="form-control" name="horas_out" required>
        </div>
        
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection