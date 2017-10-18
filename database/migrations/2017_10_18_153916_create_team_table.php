<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team', function(Blueprint $table)
		{
			$table->increments('team_id');
			$table->string('team_name', 250)->nullable();
			$table->integer('team_event_id')->nullable();
			$table->integer('team_point')->default(0);
			$table->integer('team_status')->default(1);
			$table->integer('team_register_by');
			$table->integer('team_max_rank');
			$table->timestamps();
			$table->softDeletes();
			$table->text('team_comment', 65535)->nullable();
			$table->integer('team_payment')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team');
	}

}
