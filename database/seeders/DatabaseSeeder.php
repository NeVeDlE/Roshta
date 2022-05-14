<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Role;
use App\Models\Specialization;
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
        User::factory()->create([
            'email' => "shaherabdullah2001@gmail.com",
            'password' => Hash::make('12345678'),
            'role_id' => '4',
        ]);
        Disease::factory()->create(['name' => 'cold',
            'description' => "Patient's internal organ's temperature get down"
        ]);
        Medicine::factory()->create([
            'name' => 'Congestal',
            'description' => "كونجستال أقراص | لعلاج البرد والرشح والزكام | 20 قرص",
            'price' => '19.5',
        ]);
        $names = [
            'Pediatrician', 'Neurologist', 'Otolaryngologist',
            'Ophthalmologist', 'Emergency-Doctor Said', 'Psychiatrist', 'Dermatologist',
            'Urologist', 'Cardiologist', 'Al-Veterinarian', 'Paramedic',
            'Nephrologist', 'Obstetrician', 'ENTspecialist', 'Anesthetist',
            'endocrinologist', 'Anatomist', 'Microbiologist', 'General-Practitioner',
            'Hematologist', 'Surgeon'
        ];
        foreach ($names as $name) {
            Specialization::factory()->create(['name' => $name]);
        }


    }
}
