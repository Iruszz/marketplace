<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conversation>
 */
class ConversationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ad_id' => Ad::inRandomOrder()->value('id') ?? Ad::factory(),
            'owner_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'buyer_id' => User::inRandomOrder()->value('id') ?? User::factory(), 
        ];
    }
}
