<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'profileId' => fake()->randomDigit(),
            'subscriptionId' => fake()->randomDigit(),
            'userSentId' =>  fake()->randomDigit(), 
            'userGetId' =>  fake()->randomDigit(), 
            ];
    }
}
