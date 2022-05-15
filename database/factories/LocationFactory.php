<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'owner_id' => User::factory()->create()->id,
            'lat' => 27.740473,
            'lng' => 30.839398,
            'name' => $this->faker->name,
            'status' => 'Pending'
        ];
    }
}
