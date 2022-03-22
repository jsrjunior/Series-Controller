<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogNovaSerie implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        Log::info('Serie Adicionada', 
            [
                'Nome' =>               $event->nomeSerie, 
                'Qtd Temporadas' =>     $event->qtdTemporadas, 
                'Qtd Episodios' =>      $event->qtdEpisodios
            ]
        );
    }
}
