<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
