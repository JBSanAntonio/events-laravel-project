<?php
use \Esensi\Model\Model;

class CalendarEvent extends Model
{
	protected $table = 'calendar_events';

	protected $rules = array(
		'start_date_time' => 'required|dateTime',
		'end_date_time' => 'required|dateTime',
		'title' => 'required|max:255',
		'description' => 'required|max:255',
		'price' => 'required|integer',
	);

	protected $fillable = array(
		/*receive array from user info and can pass into new calendar event 
		shortcut - can do as long as columns set as fillable*/
	);

	/*tells Laravel which dates in column need to be treated as dates; automaticall
	converts to carbon objects*/
	public function getDates()
	{
		return array_merge(parent::getDates(), 'start_time', 'end_time');

	}

	public function users()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function locations()
	{
	    return $this->hasMany('Location', 'location_id');
	}







	

}