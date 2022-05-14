<?php

namespace Database\Factories;

use App\Models\Specialization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'specialization_id' => Specialization::factory()->create()->id,
            'university' => $this->faker->name,
            'degree' => '123',
            'status' => 'pending',
            'graduate_date' => $this->faker->date,
        ];
    }
}
