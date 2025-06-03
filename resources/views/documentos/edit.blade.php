@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
    <h1>Editar Documento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentos.update', $documento->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="documento" class="form-label">Selecione documento pdf</label>
            <input type="file" class="form-control" name="documento" accept="application/pdf" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{ $documento->descricao }}" required>
        </div>
        <div class="mb-3">
            <label for="horas_in" class="form-label">Horas_in</label>
            <input type="number" class="form-control" name="horas_in" value="{{ $documento->horas_in }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" value="{{ $documento->status }}" readonly required>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <input type="text" class="form-control" name="comentario" value="{{ $documento->comentario }}" required>
        </div>
        <div class="mb-3">
            <label for="horas_out" class="form-label">Horas_out</label>
            <input type="number" class="form-control" name="horas_out" value="{{ $documento->horas_out }}" required>
        </div>
        
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected($categoria->id == $documento->categoria_id)>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection