<?php

namespace App\Listeners;

use App\Events\SerieApagar;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ExcluirCapaSerie
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
     * @param  SerieApagar  $event
     * @return void
     */
    public function handle(SerieApagar $event)
    {
        $serie = $event->serie;
        if($serie->capa)
            Storage::delete($serie->capa);
    }
}
