<?php

namespace Tests\Feature;

use App\Http\Livewire\admin\jobs\JobsRequests;
use App\Http\Livewire\admin\MedicinesIndex;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageJobs extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_patient_cannot_render_jobs_control()
    {
        $this->boot();
        $user = User::factory()->create(['role_id' => '4',]);
        $this->actingAs($user);
        \Livewire::test(JobsRequests::class)->assertStatus(403);
    }

}
