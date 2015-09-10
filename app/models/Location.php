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

	public function calendar_events()
	{
	    return $this->belongsToMany('CalendarEvent');
	}
}


