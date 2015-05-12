<?php namespace rhwilr\mcUserAdminPortal\Http\Controllers\Info;

use rhwilr\mcUserAdminPortal\Http\Controllers\Controller;
use View;

class MumbleController extends Controller
{

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
     * Show Info Page.
     *
     * @return Response
     */
    public function getInfo()
    {
        return View::make('pages.info.mumble.info');
    }

}