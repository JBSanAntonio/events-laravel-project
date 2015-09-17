<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventsLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events_locations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('calendar_events_id')->unsigned();
			$table->integer('location_id')->unsigned();
			$table->foreign('calendar_events_id')->references('id')->on('calendar_events')->onDelete('cascade');
		    $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_events_locations');
	}

}
