<?php

namespace Database\Factories;

use App\Models\Specializations;
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
            'specialization_id'=>1,
            'university'=>$this->faker->name,
            'status'=>'pending',
            'graduate_date'=>$this->faker->date,
        ];
    }
}
