<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->role->name == 'admin';
        });
        Gate::define('doctor', function (User $user) {
            return $user->role->name == 'doctor';
        });
        Gate::define('pharmacist', function (User $user) {
            return $user->role->name == 'pharmacist';
        });
        Gate::define('patient', function (User $user) {
            return $user->role->name == 'patient';
        });

    }
}
