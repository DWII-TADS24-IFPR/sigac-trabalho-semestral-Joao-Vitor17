@extends('layouts.app')

@section('title', 'Detalhes do Eixo')

@section('content')
    <h1>Detalhes do Eixo</h1>

    <table class="table table-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $eixo->id }}</td>
                <td scope="col">{{ $eixo->nome }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('eixos.index') }}" class="btn btn-primary">Voltar</a>
@endsection