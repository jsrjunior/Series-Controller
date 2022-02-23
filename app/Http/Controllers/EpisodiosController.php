<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('episodios', 'temporadaId','mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodios = $request->episodios;
        foreach ($temporada->episodios as &$episodio) {
            $episodio->assistido = in_array($episodio->id, $episodios);
        }

        $request
            ->session()
            ->flash('mensagem', "Epiśodios assistidos salvos");
        $temporada->push();
        return redirect()->back();
    }
}
