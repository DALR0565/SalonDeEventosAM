<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Gerente;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Observers\ObserverCliente;
use App\Observers\ObserverEvento;
use App\Observers\ObserverGerente;
use App\Observers\ObserverPaquete;
use App\Observers\ObserverServicio;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Cliente::observe(ObserverCliente::class); 
        Gerente::observe(ObserverGerente::class);
        Paquete::observe(ObserverPaquete::class);
        Servicio::observe(ObserverServicio::class);
        Evento::observe(ObserverEvento::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
