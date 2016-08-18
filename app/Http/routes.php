<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Static, public-facing routes
 */
Route::get('/', function () { return view('site/index'); });
Route::get('/schedule', function () { return view('site/schedule'); });
Route::get('/members', function () { return view('site/members'); });
Route::get('/auditions', function () { return view('site/auditions'); });
Route::get('/staff', function () { return view('site/staff'); });
Route::get('/news', function () { return view('site/news'); });
Route::get('/store', function () { return view('site/store'); });
Route::get('/contact', function () { return view('site/contact'); });
Route::post('/contact', 'ContactController@sendContactInfo');


/**
 * Members-only routes
 */
Route::auth();

Route::get('/home', 'HomeController@index');
