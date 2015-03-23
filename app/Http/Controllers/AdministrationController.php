<?php namespace rhwilr\mcUserAdminPortal\Http\Controllers;

use rhwilr\mcUserAdminPortal\Models\User;
use rhwilr\mcUserAdminPortal\Models\Role;
use rhwilr\mcUserAdminPortal\Http\Requests;
use rhwilr\mcUserAdminPortal\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;

/**
 * Class AdministrationController
 * @package rhwilr\mcUserAdminPortal\Http\Controllers
 */
class AdministrationController extends Controller {


	/**
	 * Instantiate a new AdministrationController instance.
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
		$users = User::all();
		$roles = Role::all();

		return View::make('pages.administration.index', compact("users", "roles"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
