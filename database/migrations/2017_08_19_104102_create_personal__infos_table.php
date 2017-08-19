<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal__infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('Nickname');
            $table->date('Birthday');
            $table->string('Tel'); //not sure
            $table->unsignedTinyInteger('Rank'); //not sure
            $table->string('Team');
            $table->string('Picture'); //should have default
            $table->integer('Gift_Points')->default(0);
            $table->boolean('Is_Player');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal__infos');
    }
}
