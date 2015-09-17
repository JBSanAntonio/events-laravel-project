@extends('layouts.master')

<title>Show All Calendar Events</title>

@section('content')

<h1>Listing of Calendar Events</h1>

{{-- 
	{{ $calendar_events->links() }}
 --}}

{{-- below gives message for all errors in the $validator array in the PostsController.php file --}}

 
	@foreach($calendar_events as $calendarevent)
		{{-- $calendarevents = DB::table('calendarevents')
		                			->orderBy('start_date_time', 'desc')
				                    ->groupBy('count')
				                    ->having('count', '>', 100)
		                			->get();               --}}
	<h3><strong>Title: {{{$calendarevent->title}}}</strong></h3> 
	<h5><strong>Price: </strong>{{{number_format($calendarevent->price, 2) }}}</h5>
	<h5><strong>Description: </strong>{{{Str::words($calendarevent->description, 20) }}}</h5>

	<h5><strong>Start Time: </strong>{{$calendarevent->start_date_time->setTimezone('America/Chicago')->format('Y-m-d H:i')}}</h5>

	<h5><strong>End Time: </strong>{{$calendarevent->end_date_time->setTimezone('America/Chicago')->format('Y-m-d H:i')}}</h5>

	{{-- <h5><strong>Calendar Event Tags: </strong>

		@foreach($calendarevent->tags as $tag)
			{{{ $tag->name }}}
		@endforeach
	 </h5> --}}

	{{-- <h5 class = "postImage">CalendarEvent Image: {{{Str::words($calendarevent->image, 20) }}}</h5> --}}

	<a href="{{{action('CalendarEventsController@show', $calendarevent->id)}}}">Read Calendar Event</a>
	@endforeach


	{{-- TO DO: ADD TAGS TO INDEX PAGE --}}

@stop

{{-- http://stackoverflow.com/questions/28051899/undefined-variable-image-laravel CODE FOR IMAGES ON VIEW PAGE --}}

{{-- <ul>
    @foreach($image as $images)
      <li>{{$images->image_name}}</li>
    @endforeach
</ul> --}}


<script>

 /*Add Google Analytics*/

</script>

