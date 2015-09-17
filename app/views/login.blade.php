<!-- app/views/login.blade.php -->

@extends('layouts.master')

<!doctype html>
<html>
<head>
<title>Look at me Login</title>
</head>
<body>

@section('content')


{{ Form::open(array('url' => 'login')) }} {{ Form::token() }}
<h1>Login</h1>

<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'name@email.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit') }}</p>
{{ Form::close() }}

@stop
