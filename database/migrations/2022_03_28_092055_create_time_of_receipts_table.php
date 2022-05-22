<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeOfReceiptsTable extends Migration
{

    public function up()
    {
        Schema::create('time_of_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Doctor_id')->nullable();
            $table->foreign('Doctor_id')->references('id')->on('doctors');
            $table->date('Receipt_Date');
            $table->time('Time');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_of_receipts');
        Schema::create('time_of_receipts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
