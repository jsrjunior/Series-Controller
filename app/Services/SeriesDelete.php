<?php
namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class SeriesDelete{
    public function deleteSerie(int $serieId): string
    {
        $nome = '';
        DB::transaction(function () use ($serieId, &$nome) {
            $serie = Serie::find($serieId);
            $nome = $serie->nome;
            $this->deleteTemporadas($serie);
            $serie->delete();
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