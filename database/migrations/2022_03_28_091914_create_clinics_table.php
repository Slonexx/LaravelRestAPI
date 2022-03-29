<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{

    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Clinic');
            $table->string('Address');
            $table->string('URL_Picture');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
