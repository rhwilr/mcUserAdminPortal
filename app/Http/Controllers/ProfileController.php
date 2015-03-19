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
		//
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
	 * @param  int  $user
	 * @return View
	 */
	public function show($user)
	{
		return View::make('pages.profile.show', compact('user'));
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
	public function update($user, Request $request )
	{
		$user->update($request->input());
		$user->save();

		return redirect()->back();
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
