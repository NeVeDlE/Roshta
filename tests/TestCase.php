<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function signIn($user = null)
    {
        $user = $user ?: User::factory()->create();
        $this->actingAs($user);
        return $user;
    }
    public function boot(){
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'doctor']);
        Role::factory()->create(['name' => 'pharmacist']);
        Role::factory()->create(['name' => 'patient']);
    }
}
