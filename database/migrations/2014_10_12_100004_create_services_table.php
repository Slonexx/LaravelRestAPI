<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Service');
            $table->string('Descriptions');
            $table->unsignedBigInteger('Clinic_id')->nullable();
            $table->foreign('Clinic_id')->references('id')->on('clinics');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
        Schema::create('services', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
