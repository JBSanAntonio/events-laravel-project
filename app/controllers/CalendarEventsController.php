<?php

class CalendarEventsController extends \BaseController {

	/**
	 * Display a listing of calendarevents
	 *
	 * @return Response
	 */
	public function index()
	{
		$calendarevents = Calendarevent::all();

/*		return View::make('calendarevents.index', compact('calendarevents'));*/

		return View::make('calendar_events.index', compact('calendarevents'));
		
		//show all events here
		$query = Calendarevent::with('user');

		$search=Input::get('search');

		if (Input::has('search')) {
			$query->where('title', 'like', '%'. $search . "%")
				  ->orWhere('description', 'like', '%' . $search . "%")
/*				  ->orWhereHas('tag', function($q) use ($name){
				  	$q->where('name', 'like', '%' . $search . "%")
				  }	*/	
				  ->orWhereHas('user', function($q) use ($search){			
					$q->where('first_name', 'like', '%' . $search . "%")
					  ->orWhere('last_name', 'like', '%' . $search . "%");
			});
		}
		$posts = $query->orderBy('created_at', 'desc')->paginate(10);
    
		return View::make('calendarevents.index')->with('calendarevents', $calendarevents);
	}

	/**
	 * Show the form for creating a new calendarevent
	 *
	 * @return Response
	 */

	public function create()
	{
		return View::make('calendarevents.create');
	}

	/**
	 * Store a newly created calendarevent in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Calendarevent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Calendarevent::create($data);

		return Redirect::route('calendarevents.index');
	}

	/**
	 * Display the specified calendarevent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$calendarevent = Calendarevent::findOrFail($id);

		return View::make('calendarevents.show', compact('calendarevent'));
	}

	/**
	 * Show the form for editing the specified calendarevent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calendarevent = Calendarevent::find($id);

		return View::make('calendarevents.edit', compact('calendarevent'));
	}

	/**
	 * Update the specified calendarevent in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendarevent = Calendarevent::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Calendarevent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$calendarevent->update($data);

		return Redirect::route('calendarevents.index');
	}

	/**
	 * Remove the specified calendarevent from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Calendarevent::destroy($id);

		return Redirect::route('calendarevents.index');
	}

}
