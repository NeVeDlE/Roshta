<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageRolesTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_admin_can_add_new_role()
    {
        $this->withoutExceptionHandling();
        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $role = Role::factory()->raw();

        $this->actingAs($user)
            ->post('/roles', ['name' => $role['name']])
            ->assertRedirect('/roles');
        $this->assertDatabaseHas('roles', ['name' => $role['name']]);

    }
}
