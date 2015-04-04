<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Controllers;

use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Response;
use Config;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * Class APIController
 * @package rhwilr\mcUserAdminPortal\Api\v1\Controllers
 */
abstract class APIController extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    /**
     * @var int
     */
    protected $statusCode = IlluminateResponse::HTTP_OK;


    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        if (Config::get('api.slow_mode')){
            sleep(2);
        }
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * @param Paginator $items
     * @param $data
     * @return mixed
     */
    public function respondWithPagination(Paginator $items, $data)
    {
        $data = array_merge(['data' => $data], [
            'paginator' => [
                'total_count' => $items->total(),
                'total_pages' => ceil($items->total() / $items->perPage()),
                'current_page' => $items->currentPage(),
                'limit' => (integer) $items->perPage(),
            ]
        ]);
        return $this->respond($data);
    }


    /**
     * @param string $message
     * @return mixed
     */
    public function respondStored($message = 'Record has been stored')
    {
        return $this->respond([
            'success' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondUpdated($message = 'Record has been updated')
    {
        return $this->respond([
            'success' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondDestroy($message = 'Record has been deleted')
    {
        return $this->respond([
            'success' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message = 'An error occured.')
    {
        return $this->respond([
                'error' => [
                    'message' => $message,
                    'status_code' => $this->getStatusCode()
                ]
            ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }


    /**
     * @param string $message
     * @return mixed
     */
    public function respondValidationFailed($message = 'Validation Failed')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }


}
