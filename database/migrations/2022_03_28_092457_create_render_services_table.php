<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenderServicesTable extends Migration
{

    public function up()
    {
        Schema::create('render_services', function (Blueprint $table) {
            $table->id();
            $table->string('Diagnosis');
            $table->string('Appointment');
            $table->string('Add_Info');

            $table->unsignedBigInteger('Animal_Cards_id')->nullable();
            $table->foreign('Animal_Cards_id')->references('id')->on('animal_cards');

            $table->unsignedBigInteger('Service_id')->nullable();
            $table->foreign('Service_id')->references('id')->on('services');

            $table->unsignedBigInteger('Doctor_id')->nullable();
            $table->foreign('Doctor_id')->references('id')->on('doctors');

            $table->unsignedBigInteger('Time_Of_Receipts_id')->nullable();
            $table->foreign('Time_Of_Receipts_id')->references('id')->on('time_of_receipts');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('render_services');
        Schema::create('render_services', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
