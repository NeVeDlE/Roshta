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
        Gate::define('clinic', function (User $user, Location $location) {

            return $location->type == 'clinic';
        });
        Gate::define('hasClinic', function (User $user) {
            return isset($user->locations) && $user->locations->type == 'clinic'&& $user->locations->status = 'accepted';
        });
        Gate::define('hasPharmacy', function (User $user) {
            return isset($user->locations) && $user->locations->type == 'pharmacy'&& $user->locations->status = 'accepted';
        });
        Gate::define('clinicOwner', function (User $user, Location $clinic) {
            return $user->id == $clinic->owner_id && $clinic->type == 'clinic';
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
