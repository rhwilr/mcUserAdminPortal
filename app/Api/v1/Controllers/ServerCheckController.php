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
class ServerCheckController extends APIController {

    /**
     * @var \rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerOnlineTransformer
     */
    protected $serverOnlineTransformer;

    /**
     * ServerController constructor.
     * @param $serverTransformer
     */
    public function __construct(\rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerOnlineTransformer $serverOnlineTransformer)
    {
        $this->serverOnlineTransformer = $serverOnlineTransformer;
        $this->middleware('auth.api');
    }


    /**
     * Show
     *
     * @return Response
     */
    public function index(Request $request,$serverId)
    {

        $server = Server::find($serverId);
        if (!$server) {
            return $this->respondNotFound('Server does not exist.');
        }

        $rcon = new Rcon($server);
        $list_players = $rcon->list_players();

        $response = [
            'online' => $rcon->online(),
            'player_online' => $list_players['player_online'],
            'player_max' => $list_players['player_max']
        ];

        return $this->respond([
            'data' => $this->serverOnlineTransformer->transform($response)
        ]);

    }

}