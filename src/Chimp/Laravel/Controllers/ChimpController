<?php

namespace Chimp\Laravel\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Response;
// use Illuminate\Http\JsonResponse;
// use Illuminate\Support\Facades\App;


/**
 * Class ChimpController
 * @package Chimp\Laravel\Controllers
 */
abstract class ChimpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * singleResponse.
     * @param mixed $data
     * @param string $messsage
     * @param Int $httpCode
     */
    public function singleResponse($data, String $messsage = '', Int $httpCode = 200)
    {
        return response()->json([
            'data' => $data,
            'messsage' => $messsage,
        ], $httpCode);
    }

    /**
     * listResponse.
     * @param mixed $data
     * @param string $messsage
     * @param Int $httpCode
     */
    public function listResponse($data, String $messsage = '', Int $httpCode = 200)
    {
        return response()->json([
            'data' => $data,
            'messsage' => $messsage,
        ], $httpCode);
    }

    /**
     * notFound.
     * @param string $messsage
     * @param Int $httpCode
     */
    public function success(String $messsage = 'Request succeeded.', Int $httpCode = 200)
    {
        return response()->json([
            'messsage' => $messsage,
        ], $httpCode);
    }

    /**
     * notFound.
     * @param string $messsage
     * @param Int $httpCode
     */
    public function notFound(String $messsage = 'Requested item not found.', Int $httpCode = 404)
    {
        return response()->json([
            'messsage' => $messsage,
        ], $httpCode);
    }

    /**
     * badRequest.
     * @param string $messsage
     * @param Int $httpCode
     */
    public function badRequest(String $messsage = 'Invalid request.', Int $httpCode = 400)
    {
        return response()->json([
            'messsage' => $messsage,
        ], $httpCode);
    }

    /**
     * noDataResponse.
     * @param string $messsage
     * @param Int $httpCode
     */
    public function noDataResponse(String $messsage, Int $httpCode)
    {
        return response()->json([
            'messsage' => $messsage,
        ], $httpCode);
    }
}
