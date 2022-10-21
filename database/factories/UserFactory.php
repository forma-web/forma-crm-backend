<?php

namespace Database\Factories;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
final class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = rand(0, 1) == 0 ? 'male' : 'female';
        $genderEnum = $gender === 'male' ? SexEnum::MAN : SexEnum::WOMAN;

        return [
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'birth_date' => fake()->date(),
            'sex' => $genderEnum,
            'password' => Hash::make('password'),
        ];
    }
}
