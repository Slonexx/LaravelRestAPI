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
            $table->foreignId('User_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('animal_cards');
    }
}
