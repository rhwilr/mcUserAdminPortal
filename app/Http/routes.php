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

Route::get('home', 'DashboardController@index');
Route::get('/', ['as' => 'home', 'uses' =>'DashboardController@index']);

Route::resource('profile', 'ProfileController', ['only' => 'index']);

Route::get('patron', ['as' => 'patron', 'uses' => 'SubscriptionController@index']);
Route::post('patron', ['as' => 'payment', 'uses' => 'Billing\PaypalController@postPayment',]);
Route::get('patron/status', ['as' => 'payment.status', 'uses' => 'Billing\PaypalController@getPaymentStatus',]);

Route::resource('admin', 'AdministrationController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
