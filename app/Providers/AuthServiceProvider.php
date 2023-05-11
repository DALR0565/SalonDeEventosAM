<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /*public function __construct(){
        session_start();
    }
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
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
