@extends('layouts.master')

{{-- /vagrant/sites/events.dev/app/views/calendar_events/create.blade.php
 --}}

<title>Create Calendar Event</title>

@section('content')

<h1>Create Calendar Event</h1>

{{-- uses token control option below to prevent Cross Site Request Forgery (CSRF) attacks --}}

	{{ Form::open(array('action' => 'CalendarEventsController@store', 'files'=>true)) }}
		<div class="form-group" @if($errors->has('title')) has-error @endif">
			{{Form::label('title', 'Title') }}
			{{Form::text('title', null, ['class'=> 'form-control']) }}
		</div>
		<div class="form-group" @if($errors->has('description')) has-error @endif">
			{{Form::label('description', 'Description') }}
			{{Form::textarea('description', null, ['class'=> 'form-control']) }}
		</div>
		<div class="form-group" @if($errors->has('price')) has-error @endif">
			{{Form::label('price', 'Price')}}
			{{Form::text('price', null, ['class'=> 'form-control']) }}
		</div>

{{-- <div class="mic-info"> on {{date('Y-m-d H:i:s',strtotime($item->create\
dAt))}}</div> --}}

	    <div class='col-md-6'>
	        <div class="form-group">
	            <div class='input-group date' id='start_date_time'>
	                <input type='text' name="start_date" class="form-control" />
	                <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-calendar"></span>
	                </span>
	            </div>
	        </div>
	 	</div>
	    <div class='col-md-6'>
	        <div class="form-group">
	            <div class='input-group date' id='end_date_time'>
	                <input type='text' name="end_date" class="form-control" />
	                <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-calendar"></span>
	                </span>
	            </div>
	        </div>
	    </div>


{{-- TAGS EXAMPLE FROM jQUERY PLUGIN  --}}
		<div class="form-group tags" @if($errors->has('tags')) has-error @endif"><strong>Tags: </strong>
			<input name="tag_list" id="tags" class="tags" value="">
		</div>

		<div style="overflow:hidden;">

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

{{-- Bower install of Bootstrap datetimepicker --}}
 <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
 
  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

{{-- tagsinput.js --}}
<script src="/js/jquery.tagsinput.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />	
<script>

		$(document).ready(function(){

			$('#start_date_time').datetimepicker();
	        $('#end_date_time').datetimepicker({
	            useCurrent: false //Important! See issue #1075
	        });

	        $("#start_date_time").on("dp.change", function (e) {
	            $('#end_date_time').data("DateTimePicker").minDate(e.date);
	        });

	        $("#end_date_time").on("dp.change", function (e) {
	            $('#start_date_time').data("DateTimePicker").maxDate(e.date);
	        });
	        
					         				         
			
			$('#tags').addTag('');
			$('#tags').tagsInput();
		});

</script>


{{-- NEW code below for image in form --}}

		<div class="form-group" @if($errors->has('url')) has-error @endif">
			{{Form::label('url', 'url') }}
			{{Form::file('url') }}         
	    </div>

{{-- HTML tag option - alternative to putting images/save in Form::open(array... above) --}}
{{-- <form action="/images/save" method="post" enctype="multipart/form-data"> --}}
		<div class="form-group">
		    {{ Form::submit('Save New Event', 
		      array('class'=>'btn btn-primary')) }}
		</div>
	
{{ Form::close() }}

@stop

<script>
/*  add Google analytics*/
</script>
@stop