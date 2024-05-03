<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\AdminPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function boot(): void
    {
        /*$this->registerPolicies();

        Gate::define('isAdmin', function (User $user): bool {
            return (bool) $user->role === 'Admin';
        });

        Gate::define('isCliente', function (User $user) {
            return $user->role === 'Cliente';
        });*/
    }
}
