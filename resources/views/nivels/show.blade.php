@extends('layouts.app')

@section('title', 'Detalhes do Nível')

@section('content')
    <h1>Detalhes do Nivel</h1>

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $nivel->id }}</td>
                <td scope="col">{{ $nivel->nome }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('nivels.index') }}" class="btn btn-primary">Voltar</a>
@endsection