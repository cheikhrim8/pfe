<?php

namespace App\Providers;

use http\Client\Curl\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit_users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('delete_users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('manage_users' , function ($user){
            return $user->hasAnyRole();
        });

        Gate::define('instructor' , function ($user){
            return $user->isInstructor(['admin', 'teacher']);
        });
    }
}
