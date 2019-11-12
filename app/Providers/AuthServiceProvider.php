<?php

namespace App\Providers;

use App\CreditCard;
use App\Policies\CardPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        CreditCard::class => CardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::before(function (User $user) {
        //     if ($user->role === "admin") {
        //         return true;
        //     }
        // });

        Gate::define('isAdmin', function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
        });

        //
    }
}
