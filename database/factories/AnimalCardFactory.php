<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalCardFactory extends Factory
{

    public function definition()
    {
            return [
                'Nickname_Animal' => $this->faker->firstName(),
                'Type_Animal' => 'Кот',
                'Age_Animal' => mt_rand(1, 10),
                'User_id' => mt_rand(1, 10),

            ];
    }
}
