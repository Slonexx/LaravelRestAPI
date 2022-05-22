<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{

    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Doctor');
            $table->string('Speciality');
            $table->string('photo_id');
            $table->unsignedBigInteger('Service_id')->nullable();
            $table->foreign('Service_id')->references('id')->on('services');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
        Schema::create('doctors', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
