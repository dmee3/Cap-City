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
Route::get('/staff', function () { return view('site/staff'); });
Route::get('/news', function () { return view('site/news'); });
Route::get('/store', function () { return view('site/store'); });
Route::get('/contact', function () { return view('site/contact'); });
Route::post('/contact', 'ContactController@sendContactInfo');

/* Auditions routes */
/*
Route::get('/auditions', function () { return view('site/auditions'); });
Route::get('/auditions-success', function () { return view('site/auditions-success'); });
Route::post('/auditions', 'AuditionController@signUp');
Route::get('/get-packet', 'AuditionController@getPacket');
*/

/**
 * Basic login/logout/register routes
 */
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
//Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
//Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);


/**
 * Web routes - general
 */
Route::get('/home', 'HomeController@index');
Route::get('/settings', 'HomeController@settings');
Route::post('/settings', 'HomeController@changePassword');
Route::get('/full-schedule', 'HomeController@schedule');

/**
 * Web routes - admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function() {

	//View routes
	Route::get('/registrations', 'AuditionController@showAll');
	Route::get('/create-user', function() { return view('admin.create-user'); });
	Route::get('/dues', 'PaymentController@index');
	Route::get('/members', 'MemberController@index');
	Route::get('/conflicts', 'ConflictController@index');

	//Form routes
	Route::post('/create-user', 'AdminController@createUser');
	Route::post('/dues', 'PaymentController@store');
	Route::post('/members', 'MemberController@delete');
});

/**
 * JSON routes - admin
 */
Route::group(['prefix' => '/api/admin', 'middleware' => ['auth', 'role:Admin']], function() {
	Route::get('/conflicts', 'ConflictController@allConflicts');
	Route::get('/battery-dues-payments', 'PaymentController@batteryDues');
	Route::get('/front-dues-payments', 'PaymentController@frontDues');
	Route::get('/members', 'MemberController@allMembers');
});

/**
 * App routes - member
 */
Route::group(['middleware' => ['auth', 'role:Member']], function() {
	Route::post('/home', 'PaymentController@newStripePayment');
	Route::post('/add-conflict', 'ConflictController@newConflict');
});

/**
 * JSON routes - general
 */
Route::group(['prefix' => '/api/admin'], function() {
	Route::get('/pay-schedule', 'PaymentController@payDates');
});
