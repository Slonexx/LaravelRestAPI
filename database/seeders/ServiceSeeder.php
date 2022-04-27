<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('services')->insert([
            [
                'Name_Service' => 'Прием врача',
                'Descriptions'=>'Осмотр животного, сбор анамнеза. Постановка предварительного диагноза.',
                'Doctor_id'=>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Прием врача',
                'Descriptions'=>'Осмотр животного, сбор анамнеза. Постановка предварительного диагноза.',
                'Doctor_id'=>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Прием врача',
                'Descriptions'=>'Осмотр животного, сбор анамнеза. Постановка предварительного диагноза.',
                'Doctor_id'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Прием врача',
                'Descriptions'=>'Осмотр животного, сбор анамнеза. Постановка предварительного диагноза.',
                'Doctor_id'=>'4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name_Service' => 'Вакцинация животного',
                'Descriptions'=>'Осмотр животного, термометрия, консультация, стоимость вакцины, постановка вакцины',
                'Doctor_id'=>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Вакцинация животного',
                'Descriptions'=>'Осмотр животного, термометрия, консультация, стоимость вакцины, постановка вакцины',
                'Doctor_id'=>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Вакцинация животного',
                'Descriptions'=>'Осмотр животного, термометрия, консультация, стоимость вакцины, постановка вакцины',
                'Doctor_id'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Вакцинация животного',
                'Descriptions'=>'Осмотр животного, термометрия, консультация, стоимость вакцины, постановка вакцины',
                'Doctor_id'=>'4',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Хирургия',
                'Descriptions'=>'Хирург-ветеринар выполняет оперативные вмешательства, занимаясь лечением диких, домашних и сельскохозяйственных животных',
                'Doctor_id'=>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Хирургия',
                'Descriptions'=>'Хирург-ветеринар выполняет оперативные вмешательства, занимаясь лечением диких, домашних и сельскохозяйственных животных',
                'Doctor_id'=>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Хирургия',
                'Descriptions'=>'Хирург-ветеринар выполняет оперативные вмешательства, занимаясь лечением диких, домашних и сельскохозяйственных животных',
                'Doctor_id'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Service' => 'Хирургия',
                'Descriptions'=>'Хирург-ветеринар выполняет оперативные вмешательства, занимаясь лечением диких, домашних и сельскохозяйственных животных',
                'Doctor_id'=>'4',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
