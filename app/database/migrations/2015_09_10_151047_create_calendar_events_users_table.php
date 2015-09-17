<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('calendar_events_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('calendar_events_id')->references('id')->on('calendar_events')->onDelete('cascade');
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_events_users');
	}

}
