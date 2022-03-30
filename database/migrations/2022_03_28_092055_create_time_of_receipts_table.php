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
            $table->date('Receipt_Date');
            $table->string('Time',10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_of_receipts');
    }
}
