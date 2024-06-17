<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'userName' => fake()->name(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phoneNum' => 9999999999,
            'profileId' =>1,
            'subPlanId' =>1,
            'sex' => 'm',
            'age' => 33,
            'remember_token' => Str::random(10)

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *

     * @return static
     */


}
