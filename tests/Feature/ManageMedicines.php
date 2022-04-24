<?php

namespace Tests\Feature;

use App\Http\Livewire\admin\MedicinesIndex;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ManageMedicines extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_patient_cannot_render_disease()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '4',]);
        $this->actingAs($user);
        \Livewire::test(MedicinesIndex::class)->assertStatus(403);
    }

    public function test_an_admin_can_add_disease()
    {
        $this->boot();
        $this->withoutExceptionHandling();
        $user = User::factory()->create(['role_id' => '1',]);
        $medicine = Medicine::factory()->raw();
        $this->actingAs($user);
        \Livewire::test(MedicinesIndex::class)->set('name', $medicine['name'])
            ->set('description', $medicine['description'])->set('price', '19.5')
            ->set('photo', UploadedFile::fake()->image('test.png'))
            ->call('addMedicine');
        $this->assertDatabaseHas('medicines', [
            'name' => $medicine['name'],
            'description' => $medicine['description'],
        ]);
    }

    public function test_an_admin_can_edit_disease()
    {
        $this->boot();
        $this->withoutExceptionHandling();
        $user = User::factory()->create(['role_id' => '1',]);
        $medicine = Medicine::factory()->create();
        $this->actingAs($user);

        \Livewire::test(MedicinesIndex::class)->assertSee($medicine->name)
            ->call('editPage', $medicine)->set('name', 'meow')->call('editMedicine');
        $this->assertDatabaseHas('medicines', ['name' => 'meow']);
    }
}
