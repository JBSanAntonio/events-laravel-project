<?php

class CalendarEventsController extends \BaseController {


/* REVIEW BELOW...from http://stackoverflow.com/questions/13002626/laravels-blade-how-can-i-set-variables-in-a-template
*/	public function __construct()
	{                   
	    // Share a var with all views
	    View::share('calendarevent', '');
	    View::share('calendarevents', '');
	    View::share('calendar_events', '');
	    View::share('calendar_event', '');
	}
		
	/*makes sure user is authenticated before take any actions; filter file acts*/
/*	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		/*CalendarEvent is the Class name in CalendarEvent model*/
		$query=new CalendarEvent;

		$search=Input::get('search');

		if (Input::has('search')) {
			$query->where('title', 'like', '%'. $search . "%")
				  ->orWhere('description', 'like', '%' . $search . "%");
				 /* ->orWhereHas('tag', function($q) use ($name){
				  	$q->where('name', 'like', '%' . $search . "%")
				  }*/
				 /* ->orWhereHas('user', function($q) use ($search){			
					$q->where('first_name', 'like', '%' . $search . "%")
					  ->orWhere('last_name', 'like', '%' . $search . "%");
				  });*/
		}
		//display a listing of calendar events
		
		$calendar_events = $query->orderBy('start_date_time', 'desc')->paginate(10);

		$calendar_events=$query->get();/*->orderBy('start_date_time', 'desc')->paginate(10)
		// dd($calendar_events);
/*		compact() is a PHP function. It creates an array containing variables and their values*/
		return View::make('calendar_events.index', compact('calendar_events'));

		/*return View::make('calendar_events.index')->with('calendar_events', $calendar_events);*/
	}		
	

	/**
	 * Show the form for creating a new calendarevent
	 *
	 * 
	 * @return Response
	 */
	 

	public function create()
	{
		return View::make('calendar_events.create');

/*		return View::make('calendar_events.create', compact('calendar_events'));*/	
	}

	/**
	 * Store a newly created calendarevent in storage.
	 * 
	 * @return Response
	 */
	public function store()
	{
		/*dd(Input::all());*/
		$calendarevent = new CalendarEvent();
		return $this->validateAndSave($calendarevent);
	}

	protected function validateAndSave($calendarevent)
	{
		$calendarevent = new CalendarEvent();
		$calendarevent->title = Input::get('title');
		$calendarevent->description = Input::get('description');
		$calendarevent->price = Input::get('price');
		/*$calendarevent->start_date_time = Input::get('start_date');
		$calendarevent->end_date_time = Input::get('end_date');*/
		$calendarevent->url = Input::get('url');
		$calendarevent->user_id = 148;
		$calendarevent->location_id = 1;

		if ( ! $calendarevent->save() )
		{
			Log::info('This is some useful information.');

	    	// set flash data
			Session::flash('errorMessage', 'Unable to save input - please try again.');

			// retrieve flash data (same as any other session variable)
			$value = Session::get('key');
			return Redirect::back();
		} else {
		 // set flash data
			Session::flash('successMessage', 'Your event was successfully added.');

			// retrieve flash data (same as any other session variable)
			$value = Session::get('key');
		}
			
			/*need to add Auth::id() for create post to work*/
			/*$calendarevent->user_id = Auth::id();*/

		CalendarEvent::create($data);

		return Redirect::route('calendar_events.index');
	}

	/**
	 * Display the specified calendarevent.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	public function show($id)
	{
		
		$calendarevent = CalendarEvent::findOrFail($id);
		/*dd($calendarevent);*/

		if(!$calendarevent)
		{
			/*return Redirect::back();*/
			
			// set flash data
			Session::flash('errorMessage', 'Unable to find that event - please try again.');
			
			App::abort(404);
		}
		 	// set flash data
			Session::flash('successMessage', 'Your event was successfully found.');

			// retrieve flash data (same as any other session variable)
			$value = Session::get('key');

		/*return 'This page shows a specific event by event id number';*/
		return View::make('calendar_events.show', compact('calendar_events'));

		/*return View::make('calendar_events.show')->with('calendarevent', $calendarevent);*/
	}

	/**
	 * Show the form for editing the specified calendarevent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calendarevent = CalendarEvent::find($id);

		return View::make('calendar_events.edit', compact('calendar_events'));
	}

	/**
	 * Update the specified calendarevent in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendarevent = CalendarEvent::findOrFail($id);

		$validator = Validator::make($data = Input::all(), CalendarEvent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$calendarevent->update($data);

		return Redirect::route('calendar_events.index');
	}

	/**
	 * Remove the specified calendarevent from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CalendarEvent::destroy($id);

		return Redirect::route('calendar_events.index');
	}

}
