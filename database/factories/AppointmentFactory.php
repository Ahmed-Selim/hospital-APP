<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AppointmentStatus;

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
            "user_id" => $this->faker->randomElement(User::pluck('id')->toArray()),
            "doc_id" => $this->faker->randomElement(Doctor::pluck('id')->toArray()),
            "start_timestamp" => now() ,
            "end_timestamp" => now() + 3,
            "status_id" => $this->faker->randomElement(AppointmentStatus::pluck('id')->toArray()),
            "price" => $this->faker->random_int(100,10000)
        ];
    }
}
