<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullName' => fake()->name(),
            'shortDesc' => fake()->title(),
            'user_id' =>  1, // password
            'about' => 'omeganull',
            'sex' => 'm',
            'age' => 33
        ];
    }
}
