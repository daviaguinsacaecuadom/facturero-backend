<?php

namespace App\Providers;

use App\Models\Billing;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //admin
        Gate::define('admin', function (User $user) {
            if ($user->hasRole('admin')) {
                return true;
            }

            return false;
        });

        //edit
        Gate::define('edit', function (User $user) {
            if ($user->hasAnyRole(['admin', 'edit'])) {
                return true;
            }

            return false;
        });

        //client
        Gate::define('client', function (User $user) {

            if ($user->hasAnyRole(['admin', 'client', 'edit'])) {
                return true;
            }

            return false;
        });
    }
}
