<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function(Blueprint $table)
		{
			$table->increments('event_id');
			$table->string('event_title', 50)->default('');
			$table->text('event_description', 65535);
			$table->dateTime('event_start');
			$table->dateTime('event_end');
			$table->text('event_rank', 65535);
			$table->integer('event_user_id');
			$table->text('event_cover', 65535);
			$table->text('event_image', 65535)->nullable();
			$table->integer('event_package');
			$table->text('event_sponsor', 65535)->nullable();
			$table->integer('event_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}

}
