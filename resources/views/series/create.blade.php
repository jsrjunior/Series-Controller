@extends('layout')

@section('cabecalho')
    Adicionar Séries
@endsection
        
@section('conteudo')
    <form method="POST" action="{{ route('serie.cadastrar') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection