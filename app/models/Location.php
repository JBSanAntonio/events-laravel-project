<?php
use \Esensi\Model\Model;


class Location extends Model 
{

	protected $table = 'locations';
	
	protected $fillable = [];

	protected $rules = array(
		'title' => 'required|max:255',
		'address' => 'required|max:255',
		'city' => 'required|max:255',
		'state' => 'required|max:255',
		'zip' => 'required|integer'
	);
	
/*hasOne and hasMany tells Laravel that this table does not have the foreign key*/

	public function calendar_events()
	{
	    return $this->hasMany('CalendarEvent');
	}
}


