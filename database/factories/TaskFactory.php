<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
			'title' => fake()->name(),
			'description' => fake()->name(),
			'priority' => fake()->name(),
			'status' => fake()->name()
        ];
    }
}
