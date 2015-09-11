<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('LocationsTableSeeder');
		$this->call('CalendarEventsTableSeeder');
		/*$this->call('ImagesTableSeeder');*/
	}

}

?>
