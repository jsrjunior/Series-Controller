<?php
namespace App\Services;

use App\Episodio;
use App\Events\SerieApagar;
use App\Serie;
use App\Temporada;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SeriesDelete{
    public function deleteSerie(int $serieId): string
    {
        $nome = '';
        DB::transaction(function () use ($serieId, &$nome) {
            $serie = Serie::find($serieId);
            $serieObj = (object) $serie->toArray();
            $nome = $serie->nome;
            $this->deleteTemporadas($serie);
            $serie->delete();
            $evento = new SerieApagar($serieObj );
            event($evento);            
        });
        return $nome;
    }

    private function deleteTemporadas(Serie $serie)
    {
        $serie->temporadas->each(function (Temporada $temporada){
            $this->deleteEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function deleteEpisodios(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio){
            $episodio->delete();
        });
    }
}