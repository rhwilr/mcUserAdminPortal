<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Controllers;

use Illuminate\Http\Request;
use Response;
use rhwilr\mcUserAdminPortal\Models\User;
use Validator;

/**
 * Class ServerController
 * @package rhwilr\mcUserAdminPortal\Api\v1\Controllers
 */
class RulesController extends APIController {

    /**
     * @var \rhwilr\mcUserAdminPortal\Api\v1\Transformers\ServerTransformer
     */
    protected $userTransformer;

    /**
     * ServerController constructor.
     * @param $userTransformer
     */
    public function __construct(\rhwilr\mcUserAdminPortal\Api\v1\Transformers\UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
        $this->middleware('api.auth');
    }


    public function getIndex(Request $request)
    {

        $user = User::find(\Auth::user()->id);

        if (!$user) {
            return $this->respondNotFound('User does not exist.');
        }

        return $this->respond([
            'data' => $this->userTransformer->transform($user)
        ]);
    }

    public function postAgree(Request $request)
    {

        $user = User::find(\Auth::user()->id);

        if (!$user) {
            return $this->respondNotFound('User does not exist.');
        }

        $user->acceptRules();
        $this->dispatch(
            new \rhwilr\mcUserAdminPortal\Commands\AddWhitelist(\Auth::user()->minecraft_username)
        );

        return $this->respond([
            'success' => [
                'message' => 'Rules accepted.',
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function postDisagree(Request $request)
    {

        $user = User::find(\Auth::user()->id);

        if (!$user) {
            return $this->respondNotFound('User does not exist.');
        }

        $user->disagreeRules();
        $this->dispatch(
            new \rhwilr\mcUserAdminPortal\Commands\RemoveWhitelist(\Auth::user()->minecraft_username)
        );

        return $this->respond([
            'success' => [
                'message' => 'Rules not accepted.',
                'status_code' => $this->getStatusCode()
            ]
        ]);

    }
}