<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{

    public function definition()
    {
        return [
            'Name_Doctor' => $this->faker->name(),
            'Speciality' => 'Специальность не известная',
            'Service_id' => mt_rand(1, 21),

        ];
    }
}
