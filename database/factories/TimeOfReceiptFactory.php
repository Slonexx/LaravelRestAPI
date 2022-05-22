<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeOfReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Receipt_Date' => $this->faker->dateTimeBetween('+0 days', '+7 days'),
            'Time' => $this->faker->date('H:i:s', rand(32400,54000)), // 00:00:00 - 15:00:00,
            'Doctor_id' => mt_rand(1,21),
        ];
    }
}
