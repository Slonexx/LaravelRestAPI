<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use \App\Models\User;
use  \App\Models\AnimalCard;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(10)->create();
        AnimalCard::factory(20)->create();
         $this->call(AllSeeder::class);
        Doctor::factory(10)->create();
    }
}
