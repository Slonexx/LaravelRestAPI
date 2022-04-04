<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{

    public function definition()
    {
        return [
            'Name_Doctor' => $this->faker->firstName(),
            'Speciality' => 'Специальность',
            'URL_Picture' =>  'https://png.pngtree.com/png-vector/20190321/ourlarge/pngtree-vector-doctor-icon-png-image_855279.jpg',
            'Clinic_id' => mt_rand(1, 4),

        ];
    }
}
