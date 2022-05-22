<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalCardsTable extends Migration
{

    public function up()
    {
        Schema::create('animal_cards', function (Blueprint $table) {
            $table->id();
            $table->string('Nickname_Animal');
            $table->string('Type_Animal');
            $table->string('Age_Animal',3);
            $table->unsignedBigInteger('User_id')->nullable();
            $table->foreign('User_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('animal_cards');
        Schema::create('animal_cards', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
