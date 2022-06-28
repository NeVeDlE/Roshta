<?php

namespace Tests\Feature;

use App\Http\Livewire\admin\DiseasesIndex;
use App\Models\Disease;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageDiseasesTest extends TestCase
{
    use RefreshDatabase;
    public function test_a_patient_cannot_render_disease()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '4',]);
        $this->actingAs($user);
        \Livewire::test(DiseasesIndex::class)->assertStatus(403);
    }

    public function test_an_admin_can_add_disease()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '1',]);
        $disease = Disease::factory()->raw();
        $this->actingAs($user);
        \Livewire::test(DiseasesIndex::class)->set('name', $disease['name'])
            ->set('description', $disease['description'])->call('addDisease');
        $this->assertDatabaseHas('diseases', [
            'name' => $disease['name'],
            'description' => $disease['description'],
        ]);
    }

    public function test_an_admin_can_edit_disease()
    {
        $this->boot();
        $this->withoutExceptionHandling();
        $user = User::factory()->create(['role_id' => '1',]);
        $disease = Disease::factory()->create();
        $this->actingAs($user);

        \Livewire::test(DiseasesIndex::class)->assertSee($disease->name)
            ->call('editPage', $disease)->set('name', 'meow')->call('editDisease');
        $this->assertDatabaseHas('diseases', ['name' => 'meow']);
    }


}
