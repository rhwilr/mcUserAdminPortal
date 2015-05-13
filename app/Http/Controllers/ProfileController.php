<?php namespace rhwilr\mcUserAdminPortal\Http\Controllers;

use rhwilr\mcUserAdminPortal\Http\Requests;
use rhwilr\mcUserAdminPortal\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package rhwilr\mcUserAdminPortal\Http\Controllers
 */
class ProfileController extends Controller {


	/**
	 * Instantiate a new ProfileController instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.profile.index');
	}

}
