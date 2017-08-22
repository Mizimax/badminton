<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('Team_id');
            $table->integer('Event_id')->unsigned();
            $table->integer('User_id')->unsigned();
            $table->integer('Player_1_id')->unsigned();
            $table->integer('Player_2_id')->unsigned()->nullable();
            $table->string('Team_name')->unique();
            $table->integer('Team_point')->default(0);
            // 0 ยังไม่ประเมิน; 1 ผ่าน; 2 ไม่ผ่าน; 3 จ่ายแล้ว; 
            $table->unsignedTinyInteger('Team_Status')->default(0);

            $table->foreign('Event_id')->references('Event_id')->on('event_tables');
            $table->foreign('User_id')->references('User_id')->on('users');
            $table->foreign('Player_1_id')->references('Profile_id')->on('personal_infos');
            $table->foreign('Player_2_id')->references('Profile_id')->on('personal_infos');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
