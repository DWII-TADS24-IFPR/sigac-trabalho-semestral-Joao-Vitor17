@extends('layouts.app')

@section('title', 'Criar Eixo')

@section('content')
    <h1>Criar Eixo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eixos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('eixos.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection