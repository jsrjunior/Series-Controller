<?php

namespace Tests\Unit;

use App\Episodio;
use App\Temporada;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{
    /** @var Temporada */
    private $temporada;

    protected function setUp(): void
    {
        parent::setUp();
        $temporada = new Temporada();
        $episodio1 = new Episodio();
        $episodio1->assistido = True;
        $episodio2 = new Episodio();
        $episodio2->assistido = False;
        $episodio3 = new Episodio();
        $episodio3->assistido = True;
        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }
    public function testEpisodiosAssistidos()
    {
        $episodiosAssistido = $this->temporada->getEpisodiosAssistidos();

        $this->assertCount(2, $episodiosAssistido);

        foreach ($episodiosAssistido as $epi) {
            $this->assertTrue($epi->assistido);
        }
    }
}