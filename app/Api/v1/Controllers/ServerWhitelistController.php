<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Controllers;

use rhwilr\mcUserAdminPortal\Models\Server;
use Validator;
use Response;
use rhwilr\mcUserAdminPortal\Classes\Rcon;
use Illuminate\Http\Request;

/**
 * Class ServerController
 * @package rhwilr\mcUserAdminPortal\Api\v1\Controllers
 */
class ServerWhitelistController extends APIController {

        /**
     * ServerController constructor.
     */
    public function __construct()
    {
        $this->middleware('api.role.admin');
    }


    /**
     * Show
     *
     * @return Response
     */
    public function index()
    {

        $this->dispatch(
            new \rhwilr\mcUserAdminPortal\Commands\UpdateWhitelist()
        );

        return $this->respondUpdated();

    }

}