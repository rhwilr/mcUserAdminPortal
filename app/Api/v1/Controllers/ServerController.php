<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Controllers;

use rhwilr\mcUserAdminPortal\Models\Server;
use Validator;
use Response;
use Illuminate\Http\Request;

/**
 * Class ServerController
 * @package rhwilr\mcUserAdminPortal\Api\v1\Controllers
 */
class ServerController extends APIController {

    /**
     * @var \rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerTransformer
     */
    protected $serverTransformer;

    /**
     * ServerController constructor.
     * @param $serverTransformer
     */
    public function __construct(\rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerTransformer $serverTransformer)
    {
        $this->serverTransformer = $serverTransformer;
        $this->middleware('auth.api');
    }


    /**
     * Show .
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $limit = $request->get('limit')||$request->get('limit')<25?$request->get('limit'):25;

        $servers = Server::orderBy('name')->paginate($limit);

        return $this->respondWithPagination($servers, $this->serverTransformer->transformCollection($servers->all()));

    }

    /**
     * Show
     *
     * @return Response
     */
    public function show(Request $request,$id)
    {

        $server = Server::find($id);

        if(!$server){
            return $this->respondNotFound('Server does not exist.');
        }

        return $this->respond([
            'data' => $this->serverTransformer->transform($server)
        ]);

    }

    /**
     *
     */
    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'host' => 'required|unique:servers',
            'rcon_port' => 'required|numeric',
            'rcon_password' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        Server::create($request->input());

        return $this->respondStored();
    }


    /**
     *
     */
    public function update(Request $request,$id)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'host' => 'required|unique:servers,host,'.$id,
            'rcon_port' => 'required|numeric',
            'rcon_password' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        $server = Server::find($id);

        if(!$server){
            return $this->respondNotFound('Server does not exist.');
        }

        $server->name = $request->input('name');
        $server->host = $request->input('host');
        $server->rcon_port = $request->input('rcon_port');
        $server->rcon_password = $request->input('rcon_password');

        $server->save();

        return $this->respondUpdated();
    }

    public function destroy(Request $request,$id)
    {

        $server = Server::find($id);
        if(!$server){
            return $this->respondNotFound('Server does not exist.');
        }

        $server->delete();

        return $this->respondDestroy();
    }


}