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
}
