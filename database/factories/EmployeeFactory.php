<?php

namespace Database\Factories;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
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
            'birth_date' => $this->faker->dateTimeBetween(),
            'hire_date' => $this->faker->dateTimeThisYear(),
            'phone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->email(),
            'sex' => $sex,
            'password' => bcrypt('123456'),
//            'password' => bcrypt($this->faker->password()),
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
