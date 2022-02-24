<style>
    .list-group-series{
        width: 100%;
    }
    .item-serie{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .form-remove{
        display: contents;
    }
</style>
@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

@if(!@empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
@endif


    @auth
        <a href="{{route('series.cadastrar')}}" class="btn btn-dark mb-4">Adicionar</a>
    @endauth

    <div class="list-group-series">
        <ul class="list-group">
            @foreach ($series as $serie)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-8">
                            <span id="nome-serie-{{ $serie->id }}">{{$serie->nome}}</span>
                            <div class="input-group w-70" hidden id="input-nome-serie-{{ $serie->id }}">
                                <input type="text" id="series-name-{{$serie->id}}" class="form-control" value="{{ $serie->nome }}" style="height: 24px;">
                               @auth
                               <div class="input-group-append">
                                <button class="btn btn-primary" onclick="editarSerie({{$serie->id}})" style="width: 30px; height: 24px; margin-left: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-check"></i>
                                </button>
                                @csrf
                                </div>
                               @endauth
                            </div>
                        </div>

                        <div class="col col-4" style="display: flex; justify-content: flex-end; align-items: center;">
                            @auth
                            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})" style="width: 30px; margin-right: 2px;">
                                <i class="fas fa-edit"></i>
                            </button>
                            @endauth

                            <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm" style="width: 30px; margin-right: 2px;">
                                <i class="fas fa-external-link-alt"></i>
                            </a>

                            @auth
                            <form action="{{ route('series.remove', $serie) }}" method="post" onsubmit="return confirm('Tem certeza?');" class="form-remove">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId){
        let forData = new FormData();
        const nome = document.getElementById(`series-name-${serieId}`).value;
        const token = document.querySelector('input[name="_token"]').value;
        forData.append('nome',nome);
        forData.append('_token',token);

        const url = `/series/${serieId}/editarSerie`;
        fetch(url, {
            body: forData,
            method: 'POST'
        }).then(()=> {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>

