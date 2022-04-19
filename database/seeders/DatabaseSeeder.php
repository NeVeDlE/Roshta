<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'doctor']);
        Role::factory()->create(['name' => 'pharmacist']);
        Role::factory()->create(['name' => 'patient']);
        User::factory()->create([
            'email' => "shaherabdullah2000@gmail.com",
            'password' => Hash::make('12345678'),
            'role_id' => '1',
        ]);
    }
}
