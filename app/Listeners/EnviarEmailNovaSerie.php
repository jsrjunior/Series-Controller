<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\Mail\NovaSerie as MailNovaSerie;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerie
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
        $users = User::all();
        foreach ($users as $index => $user) {
            $mult = $index +1;
            $email = new MailNovaSerie(
                $event->nome, 
                $event->qtd_temporadas, 
                $event->qtd_episodios
            );
            //Armazena e-mail na fila de processos
            $email->subject("Serie $event->nome Adicionada");
            $when = now()->seconds($mult*6);  
            Mail::to($user)->later($when,$email);
        } 
    }
}
