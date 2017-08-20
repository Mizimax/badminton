<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('Rank_id');
            $table->integer('Event_id');
            $table->integer('Team_id');
            $table->string('Person_1_Name');
            $table->string('Person_2_Name');
            $table->unsignedTinyInteger('Rank_Value');
            // 0 ยังไม่ประเมิน; 1 ผ่าน; 2 ไม่ผ่าน; 3 จ่ายแล้ว
            $table->unsignedTinyInteger('Rank_Status')->default(0);
            $table->timestamps();

            $table->foreign('Event_id')->references('Event_id')->on('event_tables');
            //Team foreign
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
