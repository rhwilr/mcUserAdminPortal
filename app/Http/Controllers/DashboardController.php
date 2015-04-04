<?php namespace rhwilr\mcUserAdminPortal\Http\Controllers;

use View;
use gries\Rcon\MessengerFactory;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		// setup the messenger
		$messenger = MessengerFactory::create('darwin.rhwilr.ch', 25575, 'mypass');

// send a simple message
		$response = $messenger->send('tp rhwilr 00 200 00');
		echo $response;

// send a message and parse the command via. a callable
		$response = $messenger->send('list', function($arg) {
			return explode(':', $arg);
		});

		dd($response);

		return View::make('pages.dashboard.index');
	}

}