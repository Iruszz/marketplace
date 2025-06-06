<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    public function definition(): array
    {
        // Get or create a conversation
        $conversation = Conversation::inRandomOrder()->first() ?? Conversation::factory()->create();

        // Randomly pick the sender as either the buyer or owner
        $senderId = $this->faker->randomElement([$conversation->owner_id, $conversation->buyer_id]);

        return [
            'conversation_id' => $conversation->id,
            'sender_id' => $senderId,
            'body' => $this->faker->sentence(),
        ];
    }
}

