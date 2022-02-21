<?php
    namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class SeriesCreator{
    public function createSerie(string $nome, int $qtdTemporadas, int $epTemporada): Serie
    {
        $serie = new Serie();    
        DB::transaction(function () use(&$serie, $nome, $qtdTemporadas, $epTemporada) {
            $serie = Serie::create(['nome' => $nome]);
            $this->createTemporada($serie, $qtdTemporadas, $epTemporada);
        });
        return $serie;     
    }
    
    private function createTemporada(Serie $serie, int $qtdTemporadas, int $epTemporada)
    {
        for ($i=1; $i <= $qtdTemporadas; $i++) 
        { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->createEpisodios($temporada, $epTemporada);
        }
    }

    private function createEpisodios(Temporada $temporada, int $epTemporada)
    {
        for ($j=1; $j <= $epTemporada; $j++) 
        { 
            $episodios = $temporada->episodios()->create(['numero' => $j]);
        }
    }
}