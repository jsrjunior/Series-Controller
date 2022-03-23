<style>

    .list-group-series{
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        align-content: flex-start;
    }

    .card-item{
        box-sizing: border-box;
        margin: 1.5rem;
        width: 320px;
        height: 400px;
    }

    .card-container{
        background-color: #e9e5e2;
        border-radius: 5px;
    }

    .card-tittle{
        text-align: center;
        text-transform: capitalize;
        font-weight: bolder;
        font-size: larger;
        height: 10%;
        display: flex;
        align-items: flex-end;
        justify-content: center;   
    }

    .card-img{
        padding: 10px 20px;
        display: flex;
        align-content: center;
        justify-content: center;
    }

    .card-img img{
        height: 320px;
    }

    .card-info{
        height: 10%;
        justify-content: center;
    }

    .info-btns{
        display: flex;
        justify-content: center;
    }
 

    .item-serie{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .input-tittle{
        position: relative;
        display: flex;
        align-items: stretch;
        width: 86%;
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
            @foreach ($series as $serie)
                    <div class="card-item">
                        <div class="card-container">
                            <div class="card-tittle">
                                <span id="nome-serie-{{ $serie->id }}">{{$serie->nome}}</span>
                                <div class="input-tittle" hidden id="input-nome-serie-{{ $serie->id }}">
                                    <input type="text" id="series-name-{{$serie->id}}" class="form-control" value="{{ $serie->nome }}" style="height: 24px;">
                                   @auth
                                   <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})" style="width: 30px; height: 24px; margin-left: 10px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    @csrf
                                    </div>
                                   @endauth
                                </div>
                            
                            </div>
                                
                            <div class="card-img">
                                <img src="{{$serie->capa_url}}" class="img-thumbnail img-capa">
                            </div>

                            <div class="card-info">

                                <div class="info-btns">
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
                        </div>
                    </div>
    
            @endforeach
    
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

