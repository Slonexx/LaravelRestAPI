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
            'photo_id' =>  'https://png.pngtree.com/png-vector/20190321/ourlarge/pngtree-vector-doctor-icon-png-image_855279.jpg',
            'Service_id' => mt_rand(1, 21),

        ];
    }
}
