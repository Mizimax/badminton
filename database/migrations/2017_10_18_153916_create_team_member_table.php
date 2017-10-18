<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_member', function(Blueprint $table)
		{
			$table->increments('team_member_id');
			$table->string('team_member_firstname', 250)->default('');
			$table->string('team_member_lastname', 250)->default('');
			$table->string('team_member_nickname', 250)->default('');
			$table->enum('team_member_gender', array('m','f'))->default('m');
			$table->integer('team_member_age');
			$table->string('team_member_phone', 10)->default('');
			$table->text('team_member_prize', 65535)->nullable();
			$table->text('team_member_pic', 65535)->nullable();
			$table->integer('team_member_rank');
			$table->integer('team_member_event_id');
			$table->integer('team_member_team_id');
			$table->enum('team_member_status', array('NEW','REGISTED'))->default('NEW');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_member');
	}

}
