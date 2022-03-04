<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\SeriesCreator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatorSeriesTest extends TestCase
{
    public function testCreateSerie()
    {
        $create = new SeriesCreator();
        $nome = 'Teste';
        $serieTeste = $create->createSerie($nome, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieTeste);
        $this->assertDatabaseHas('series', ['id' => $serieTeste->id]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieTeste->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
