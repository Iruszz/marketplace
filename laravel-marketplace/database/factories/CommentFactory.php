<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Ad;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{

    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'ad_id' => Ad::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'body' => $this->faker->sentence(),
        ];
    }
}