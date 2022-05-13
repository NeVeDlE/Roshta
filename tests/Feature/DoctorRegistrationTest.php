<?php

namespace Tests\Feature;

use App\Http\Livewire\doctors\DoctorsCreate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoctorRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_only_patients_can_view_this_page()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '2',]);
        $this->actingAs($user);
        \Livewire::test(DoctorsCreate::class)->assertStatus(403);
    }

}
