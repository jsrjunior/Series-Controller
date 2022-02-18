<?php
    namespace App\Services;

use App\Serie;

class SeriesCreator{
    public function CreateSerie(string $nome, int $qtdTemporadas, int $epTemporada): Serie
    {        
        $serie = Serie::create(['nome' => $nome]);
        for ($i=1; $i <= $qtdTemporadas; $i++) 
        { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j=1; $j <= $epTemporada; $j++) 
            { 
                $episodios = $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return $serie;
    }
}