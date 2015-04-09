<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Controllers;

use rhwilr\mcUserAdminPortal\Models\User;
use Validator;
use Response;
use Illuminate\Http\Request;

/**
 * Class ServerController
 * @package rhwilr\mcUserAdminPortal\Api\v1\Controllers
 */
class UserController extends APIController {

    /**
     * @var \rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerTransformer
     */
    protected $userTransformer;

    /**
     * ServerController constructor.
     * @param $serverTransformer
     */
    public function __construct(\rhwilr\mcUserAdminPortal\Api\v1\Transformers\UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
        $this->middleware('api.auth');
        $this->middleware('api.role.admin', ['except' => ['me']]);
    }


    /**
     * Show .
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $limit = $request->get('limit')||$request->get('limit')<25?$request->get('limit'):25;

        $users = User::orderBy('email')->paginate($limit);

        return $this->respondWithPagination($users, $this->userTransformer->transformCollection($users->all()));

    }

    /**
     * Show
     *
     * @return Response
     */
    public function show(Request $request,$id)
    {

        $user = User::find($id);

        if(!$user){
            return $this->respondNotFound('User does not exist.');
        }

        return $this->respond([
            'data' => $this->userTransformer->transform($user)
        ]);

    }

    /**
     * Show
     *
     * @return Response
     */
    public function me(Request $request, $method = null)
    {

        $user = \Auth::user()->id;

        if($request->method() == "GET") {
            return $this->show($request, $user);
        }else{
            switch($method) {
                case 'profile':
                    return $this->updateProfile($request, $user);
                    break;
                case 'password':
                    return $this->updatePassword($request, $user);
                    break;
                case 'minecraft':
                    return $this->updateMinecraft($request, $user);
                    break;
            }
            throw new \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException(array('GET')) ;
        }
    }

    /**
     *
     */
    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        User::create($request->input());

        return $this->respondStored();
    }


    /**
     *
     */
    public function updateProfile(Request $request,$id)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id,
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        $user = User::find($id);

        if(!$user){
            return $this->respondNotFound('User does not exist.');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return $this->respondUpdated();
    }

    /**
     *
     */
    public function updatePassword(Request $request,$id)
    {
        $v = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        $user = User::find($id);

        if(!$user){
            return $this->respondNotFound('User does not exist.');
        }

        if($request->input('new_password') != $request->input('confirm_new_password')){
            return $this->respondValidationFailed(['confirm_new_password'=> ["The confirm new password field did not match your new password."]]);
        }

        if(!\Hash::check($request->input('current_password'), $user->password)){
            return $this->respondValidationFailed(['current_password'=> ["The current password field did not match your current password."]]);
        }

        $user->password = bcrypt($request->input('new_password'));
        $user->save();

        return $this->respondUpdated();
    }

    /**
     *
     */
    public function updateMinecraft(Request $request,$id)
    {
        $v = Validator::make($request->all(), [
            'minecraft_username' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->respondValidationFailed($v->errors());
        }

        $user = User::find($id);

        if(!$user){
            return $this->respondNotFound('User does not exist.');
        }

        if($user->patron_active){
            return $this->respondValidationFailed(['minecraft_username'=> ["The minecraft username field can not be changed within a patron period."]]);
        }

        $user->minecraft_username = $request->input('minecraft_username');
        $user->save();

        return $this->respondUpdated();
    }

    public function destroy(Request $request,$id)
    {

        $server = Server::find($id);
        if(!$server){
            return $this->respondNotFound('User does not exist.');
        }

        $server->delete();

        return $this->respondDestroy();
    }


}