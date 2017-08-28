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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('Profile_id');
            $table->integer('User_id')->unsigned()->nullable();
            $table->string('Gender', 1)->nullable();
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('Nickname')->nullable();
            $table->unsignedTinyInteger('Age')->nullable();
            $table->string('Tel')->nullable();
            $table->string('Picture')->default('no_pic.jpg');
            $table->integer('Gift_Points')->default(0);
            $table->boolean('Is_Player')->default(false);
            $table->unsignedTinyInteger('Rank')->nullable();
            $table->string('Prize')->nullable();
            $table->timestamps();

            $table->foreign('User_id')->references('User_id')->on('users');
            $table->index(['Firstname', 'Lastname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_infos');
    }
}
