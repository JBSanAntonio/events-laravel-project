@extends('layouts.master')

<title>Calendar Event Show Page</title>
{{-- /vagrant/sites/events.dev/app/views/calendar_events/show.blade.php--}}
@section('content')

<div class = "container col-sm-12">

	{{-- conditional, if images then go to foreach; otherwise show post without images --}}
	<div row>
		<div class = "col-sm-4 showImage">
			@foreach($calendarevent->url as $url)
				<img class = "eventImage" src="{{ '/' . $image->url }}">
			@endforeach
		</div>
		<div class = "col-sm-8 showEvent">
			{{-- <tr><th><h1>Calendar Event Number: </h1></th><td><h4>{{$calendarevent->id}}</td></h4></tr> --}}
			<h3><strong>Event Title: </strong>{{{$calendarevent->title}}}</h3>
			<h3><strong>User Name: </strong>{{$calendarevent->user->first_name}} {{$calendarevent->user->last_name}}</h3>
			<h3><strong>Description: </strong><p></p><p>{{{ $calendarevent->description}}}</h3></p>
			<h3><strong>Event Price: </strong>{{{$calendarevent->price}}}</h3>
			<h3><strong>Start Time: </strong>{{$calendarevent->start_date_time}}</h3>
			<h3><strong>End Time: </strong>{{$calendarevent->end_date_time}}</h3>

			{{-- <h3><strong>Calendar Event Tags: </strong>
			@foreach($calendarevent->tags as $tag)
				{{{ $tag->name }}}
			@endforeach
			</h3> --}}

			<a href="{{{action('CalendarEventsController@show', $calendarevent->id)}}}">Read Post</a>

		 	<p></p>
			<a href="{{{action('CalendarEventsController@edit',$calendarevent->id)}}}" class="btn btn-default">Edit Calendar Event<span class = "glyphicon glyphicon-pencil"></span></a>

			<button id="delete" class="btn btn-danger">Delete Calendar Event<span class = "glyphicon glyphicon-trash"></span></button>

			{{ Form::open(array('action' => array('CalendarEventsController@destroy', $calendarevent->id), 'method' => 'DELETE', 'id' => 'formDelete')) }}
			{{ Form::close() }}

		</div>
		{{-- </div> --}}
</div>

	<script type="text/javascript">
		"use strict";

		$('#delete').on('click', function(){

			var onConfirm = confirm('Are you sure you want to delete this post? There is no turning back!');

			if(onConfirm) {
				$('#formDelete').submit();
			}
		});

	</script>
@stop

<script>
  /*add Google Analytics*/

</script>