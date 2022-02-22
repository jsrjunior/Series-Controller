<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\SeriesCreator;
use App\Services\SeriesDelete;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesCreator $serieCreator)
    {    
        $serie = $serieCreator->createSerie($request->nome, $request->qtd_temporadas, $request->qtd_episodios);
        $request
            ->session()
            ->flash('mensagem', "Série {$serie->nome} adicionada com sucesso "); //Metodo que insere mensagem na sessão que permanece por apenas um requisição
        return redirect()->route('serie.index');
    }

    public function destroy(Request $request, SeriesDelete $serie)
    {
        $nome = $serie->deleteSerie($request->id);
        $request
            ->session()
            ->flash('mensagem', "Série $nome removida");
        return redirect()->route('serie.index');
    }

    public function editarSerie(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $serie->nome = $request->nome;
        $serie->save();
    }
}
