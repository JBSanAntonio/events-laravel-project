<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('start_date_time');
			$table->dateTime('end_date_time');
			$table->string('title', 255);
			$table->string('description', 255);
			$table->decimal('price');
			$table->integer('user_id')->unsigned();
			$table->integer('location_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('location_id')->references('id')->on('locations');
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
		Schema::table('calendar_events', function(Blueprint $table) {
			$table->dropForeign('calendar_events_user_id_foreign');
			$table->dropForeign('calendar_events_location_id_foreign');
		});

		Schema::drop('calendar_events');
	}

}
