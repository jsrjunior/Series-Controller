<?php

namespace App\Providers;

use App\Events\NovaSerie;
use App\Events\SerieApagar;
use App\Listeners\EnviarEmailNovaSerie;
use App\Listeners\ExcluirCapaSerie;
use App\Listeners\LogNovaSerie;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NovaSerie::class => [
            EnviarEmailNovaSerie::class,
            LogNovaSerie::class,
        ],
        // SerieApagar::class => [
        //     ExcluirCapaSerie::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
