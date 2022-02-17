<style>
    .list-group-series{
        width: 50%;
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


    <a href="{{route('serie.cadastrar')}}" class="btn btn-dark mb-4">Adicionar</a>

    <div class="list-group-series">
        <ul class="list-group">
            @foreach ($series as $serie)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-8">
                            {{$serie->nome}}
                        </div>

                        <div class="col col-4" style="display: flex; justify-content: flex-end; align-items: center;">
                           
                            <a href="#" class="btn btn-info btn-sm" style="width: 30px; margin-right: 2px;">
                                <i class="fas fa-external-link-alt"></i>
                            </a>

                            <form action="{{ route('serie.remove', $serie) }}" method="post" onsubmit="return confirm('Tem certeza?');" class="form-remove">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>                    
                </li>
            @endforeach
        </ul>
    </div>
@endsection

