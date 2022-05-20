<?php

namespace App\Providers;

use App\Models\Location;
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
        //can be either a doctor or a pharmacist
        Gate::define('both', function (User $user) {
            return $user->role->name == 'doctor' || $user->role->name == 'pharmacist';
        });
        Gate::define('doctor', function (User $user) {
            return $user->role->name == 'doctor';
        });
        Gate::define('pharmacyOwner', function (User $user, Location $pharmacy) {
            return $user->id == $pharmacy->owner_id && $pharmacy->type == 'pharmacy';
        });
        Gate::define('pharmacist', function (User $user) {
            return $user->role->name == 'pharmacist';
        });
        Gate::define('patient', function (User $user) {
            return $user->role->name == 'patient';
        });


    }
}
