<?php

namespace Tests\Feature;

use App\Http\Livewire\roles\RolesIndex;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageRolesTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_admin_can_view_RolesIndex_livewire()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $this->actingAs($user);
        $this->get('/dashboard/roles')->assertSeeLivewire('roles.roles-index');

    }

    public function test_an_admin_can_add_new_role_using_RolesIndex_livewire()
    {

        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $role = Role::factory()->raw();
        $this->actingAs($user);

        \Livewire::test(RolesIndex::class)->assertSee('admin')
            ->set('name', $role['name'])->call('addRole');
        $this->assertDatabaseHas('roles', ['name' => $role['name']]);
    }

    public function test_an_admin_can_delete_role_using_RolesIndex_livewire()
    {

        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $role = Role::factory()->create();
        $this->actingAs($user);

        \Livewire::test(RolesIndex::class)
            ->call('deleteRole', $role);
        $this->assertDatabaseMissing('roles', ['name' => $role['name']]);
    }

    public function test_an_admin_can_search_for_a_role_using_RolesIndex_livewire()
    {

        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $role = Role::factory()->create();
        $this->actingAs($user);

        \Livewire::test(RolesIndex::class)
            ->set('search', 'admin')->assertSee('admin')->assertDontSee('patient');

    }


}
