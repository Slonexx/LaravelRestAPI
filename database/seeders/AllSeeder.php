<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllSeeder extends Seeder
{

    public function run()
    {
        DB::table('clinics')->insert([
            [
                'Name_Clinic' => 'Zoovita',
                'Address'=>'пр-т. Нурсултана Назарбаева 103',
                'photo_id'=>'https://p0.zoon.ru/preview/OAETBBo9B0kXlhgr9x0KBQ/438x440x85/1/8/6/original_58e2f10b40c0886f708e39b4_6049c392326eb.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Clinic' => 'Ветклиника Фламинго',
                'Address'=>'ул. Мызы 33',
                'photo_id'=>'https://zvcentre.ru/wp-content/uploads/2018/11/logozvc.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Clinic' => 'VetLab',
                'Address'=>'улица Қалихан Ысқақ, 15',
                'photo_id'=>'https://ams2-cdn.2gis.com/previews/1104590322316345347/94eab5e3-85e5-4ef5-aa6a-ed84f56f42b9/1/image_112x112.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'Name_Clinic' => 'Вет-Эксперт',
                'Address'=>'Протозанова, 139',
                'photo_id'=>'https://zvcentre.ru/wp-content/uploads/2018/11/logozvc.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);


    }
}
