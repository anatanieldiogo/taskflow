<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subtask>
 */
class SubtaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subtask_name' => fake()->word(),
            'subtask_task_id' => fake()->numberBetween(1, 20),
            'subtask_status' => fake()->boolean(),
        ];
    }
}
