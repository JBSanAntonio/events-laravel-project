<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/
Route::get('/', 'HomeController@showHome');

Route::get('home', 'HomeController@showHome');

Route::resource('locations', 'LocationsController');

Route::resource('users', 'UsersController');

Route::resource('calendar_events', 'CalendarEventsController');

Route::get('about', 'HomeController@showAbout');

Route::get('login', 'HomeController@showLogin');

Route::post('login', 'HomeController@doLogin');

Route::get('logout', 'HomeController@doLogout');

Route::get('calendarevents/{id}', 'CalendarEventsController@show');



