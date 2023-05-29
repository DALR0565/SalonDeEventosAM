<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Gerente;
use App\Observers\ObserverCliente;
use App\Observers\ObserverEmpleado;
use App\Observers\ObserverGerente;
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
        Cliente::observe(ObserverCliente::class); ///Crear tambien para eventos, paquetes, etc.
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
