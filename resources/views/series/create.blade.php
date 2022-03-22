@extends('layout')

@section('cabecalho')
    Adicionar Séries
@endsection

@section('conteudo')
    <form method="POST" action="{{ route('series.cadastrar') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">N° Temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>


            <div class="col col-2">
                <label for="qtd_temporadas">Qtd. Episodios</label>
                <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
            </div>
        </div>

        <div class="row">
            <div class="col col-12">
                <label for="nome">Capa</label>
                <input type="file" class="form-control" name="capa" id="capa">
            </div>

        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
