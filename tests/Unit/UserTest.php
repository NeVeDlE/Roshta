<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_add_a_role()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $user->addRole('test');
        $this->assertDatabaseHas('roles', ['name' => 'test']);
    }

    public function test_it_can_add_a_location()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '2',]);
        $user->addLocation('test', 30.839398, 30.839398,'clinic');
        $this->assertDatabaseHas('locations', ['name' => 'test']);
    }

}
