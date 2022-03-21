<?php

namespace Database\Factories;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = $this->randomSex();
        $fakerSex = $sex == SexEnum::MAN ? 'male' : 'female';

        return [
            'first_name' => $this->faker->firstName($fakerSex),
            'last_name' => $this->faker->lastName(),
            'sex' => $sex,
            'company' => $this->faker->company(),
            'preferences' => $this->faker->text(5000),
            'wishes' => $this->faker->text(5000),
            'is_important' => (bool) mt_rand(0, 1),
        ];
    }

    /**
     * @return \App\Enums\SexEnum
     */
    private function randomSex(): SexEnum
    {
        return mt_rand(0, 1) == 0 ? SexEnum::MAN : SexEnum::WOMAN;
    }
}
