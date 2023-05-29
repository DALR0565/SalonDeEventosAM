<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Paquete;
use App\Policies\ClientePolicy;
use App\Policies\EventoPolicy;
use App\Policies\PaquetePolicy;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /*
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Evento::class => EventoPolicy::class,
        Cliente::class => ClientePolicy::class,
        Paquete::class => PaquetePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        session_start();
        if(isset($_SESSION['AuthGuard'])){
            Auth::setDefaultDriver( $_SESSION['AuthGuard']);
        }
        
        $this->registerPolicies();
    }
}
