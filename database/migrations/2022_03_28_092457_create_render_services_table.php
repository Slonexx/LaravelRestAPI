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
            $table->foreignId('Animal_Cards_id')->constrained();
            $table->foreignId('Service_id')->constrained();
            $table->foreignId('Doctor_id')->constrained();
            $table->foreignId('Time_Of_Receipts_id')->constrained();
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
