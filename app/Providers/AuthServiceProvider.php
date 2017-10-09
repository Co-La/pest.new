<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        
        //User::class => AuthPolicy::class,
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('VIEW_ADMIN', function(User $user) {
            return $user->canDo('VIEW_ADMIN');
        });

        Gate::define('UPDATE_USERS', function(User $user) {
            return $user->canDo('UPDATE_USERS');
        }) ;

        Gate::define('SAVE_TEXT', function(User $user) {
            return $user->canDo('SAVE_TEXT');
        }) ;
        //

        Gate::define('DELETE_TEXT', function(User $user) {
            return $user->canDo('DELETE_TEXT');
        }) ;

        Gate::define('UPDATE_TEXT', function(User $user) {
            return $user->canDo('UPDATE_TEXT');
        }) ;
    }
}
