<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'user_id' => User::factory()->create()->id,
            'description' => fake()->text(100),
            'date_to' => fake()->date('Y-m-d'),
            'date_from' =>fake()->date('Y-m-d'), 
        ];
    }
}
