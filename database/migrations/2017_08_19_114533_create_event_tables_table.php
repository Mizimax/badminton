<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tables', function (Blueprint $table) {
            $table->increments('Event_id');
            $table->string('Event_Name');
            $table->date('Event_Start');
            $table->date('Event_End');
            $table->unsignedTinyInteger('Rank_Min')->default(1);
            $table->unsignedTinyInteger('Rank_Max')->default(10);
            $table->integer('Event_Creator_id');
            $table->text('Event_Description');
            $table->string('Event_Cover_Pic');
            $table->string('Event_Image');
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
        Schema::dropIfExists('event_tables');
    }
}
