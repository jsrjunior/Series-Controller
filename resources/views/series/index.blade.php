@extends('layout')

@section('cabecalho')
    Séries
@endsection
        
@section('conteudo')
    <a href="/create" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{$serie->nome}}</li>
        @endforeach
    </ul>
@endsection

