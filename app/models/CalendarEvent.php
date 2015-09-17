<?php
use \Esensi\Model\Model;

class CalendarEvent extends Model
{
	protected $table = 'calendar_events';

	protected $rules = array(
		'start_date_time' => 'required|date',
		'end_date_time' => 'required|date',
		'title' => 'required|max:255',
		'description' => 'required|max:255',
		'price' => 'required|integer',
		/*'url'=> 'max:255',*/
	);

	protected $fillable = array(
		/*receive array from user info and can pass into new calendar event 
		shortcut - can do as long as columns set as fillable*/
	);

	protected $dates = ['start_date_time', 'end_date_time'];

	/*tells Laravel which dates in column need to be treated as dates; automaticall
	converts to carbon objects*/
/*	public function getDates()
	{
		return array_merge(parent::getDates(), 'start_date_time', 'end_date_time');
	}*/

/*belongsTo tells Laravel that this table holds the foreign key that connects it to the other table*/	

	public function users()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function locations()
	{
	    return $this->belongsTo('Location', 'location_id');
	}







	

}