<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Carbon\Carbon;

class CalendarEventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		/*foreach(range(1, 10) as $index)*/
		for($i=0; $i<50; $i++) 
		{	
			$calendar_event = new CalendarEvent();
			// $calendar_event->user_id = 1;
			// $calendar_event->location_id = 1;
			$calendar_event->user_id = User::all()->random()->id;
			$calendar_event->location_id = Location::all()->random()->id;
			// $calendar_event->start_date_time = '2015-09-12';
			// $calendar_event->end_date_time = '2015-09-13';
			$startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());		
			$calendar_event->start_date_time = $startDate;
			$calendar_event->end_date_time = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();
			$calendar_event->title = $faker->title;
			$calendar_event->description = $faker->catchPhrase;
			$calendar_event->price = $faker->randomNumber(2);
			$calendar_event->save();
		}
	}

}

?>