<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tailwindColors = [
            'gray-50', 'red-50', 'yellow-50', 'green-50', 'blue-50',
            'indigo-50', 'purple-50', 'pink-50',
        ];

        return [
            'name' => $this->faker->word(),
            'color' => $this->faker->randomElement($tailwindColors),
        ];
    }
}
