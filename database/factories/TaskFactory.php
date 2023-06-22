<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'task_name' => fake()->word(),
            'task_description' => fake()->realText(),
            'task_list_id' => fake()->numberBetween(1, 7),
            'task_due_date' => fake()->date(),
            'task_status' => fake()->boolean(),
        ];
    }
}
