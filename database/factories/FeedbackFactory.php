<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client' => $this->faker->firstName(),
            'raiting' => $this->faker->numberBetween(1, 5),
            'advantages' => $this->faker->paragraph(),
            'disadvantages' => $this->faker->paragraph(),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
