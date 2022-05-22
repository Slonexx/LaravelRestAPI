<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\TimeOfReceipt;
use Illuminate\Database\Seeder;
use \App\Models\User;
use  \App\Models\AnimalCard;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(4)->create();
        AnimalCard::factory(6)->create();
        $this->call(AllSeeder::class);
        $this->call(ServiceSeeder::class);
        Doctor::factory(21)->create();
        TimeOfReceipt::factory(50)->create();
    }
}
