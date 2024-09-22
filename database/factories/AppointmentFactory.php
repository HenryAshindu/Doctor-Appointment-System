<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'patient_name'=>fake()->name,
            'title'=>fake()->sentence(5),
            'date'=>fake()->date('Y-m-d', 'now'),
            'time'=> fake()->time('H:i', '18:00'),

        ];
    }
}
