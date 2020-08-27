<?php

namespace Chimp\Laravel\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;

/**
 * Class ChimpApiException
 * @package Chimp\Laravel\Exceptions
 */
abstract class ChimpApiException extends \Exception
{
    protected $statusCode = null;
    protected $errorCode = null;
    protected $publicMsg = '';
    protected $privateMsg = '';

    /**
     * @var \Exception
     */
    protected $originalException = null;

    /**
     * InvalidOrderInputException constructor.
     * @param string $publicMsg
     * @param string $privateMsg
     */
    public function __construct(string $publicMsg, string $privateMsg = null, $originalException = null)
    {
        $this->publicMsg = $publicMsg;
        $this->privateMsg = $privateMsg;
        $msg = $this->privateMsg ? $this->privateMsg : $this->publicMsg;
        if ($originalException) {
            $this->originalException = $originalException;
        }
        parent::__construct($msg);

        return $this;
    }

    public static function create(string $publicMsg, string $privateMsg = null, $originalException = null)
    {
        return new static($publicMsg, $privateMsg = null, null);
    }


    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return \Exception
     */
    public function getOriginalException(): \Exception
    {
        return $this->originalException;
    }

    /**
     * @param \Exception $originalException
     */
    public function setOriginalException(\Exception $originalException): void
    {
        $this->originalException = $originalException;
    }

    /**
     * @return null
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param null $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateMsg(): string
    {
        return $this->privateMsg;
    }

    /**
     * @param string $privateMsg
     */
    public function setPrivateMsg(string $privateMsg)
    {
        $this->privateMsg = $privateMsg;
        return $this;
    }

    public function getAPIMessage()
    {
        if (App::environment('production')) {
            return $this->publicMsg;
        } else {
            return $this->privateMsg ? $this->publicMsg . ' | ' . $this->privateMsg : $this->publicMsg;
        }
    }

    public function getApiResponse()
    {
        $data = [
            'message'     => $this->getAPIMessage(),
            'status_code' => $this->statusCode,
            'error_code'  => $this->errorCode,

        ];
        if (config('app.debug')) {
            $data['private_message'] = $this->privateMsg;
            $data['public_message'] = $this->publicMsg;
            $data['exception'] = [
                'class'   => get_class($this),
                'message' => $this->getMessage(),
                'trace'   => $this->getTrace(),
            ];
            if ($this->originalException) {
                $data['originalException'] = [
                    'class'   => get_class($this->originalException),
                    'message' => $this->originalException->getMessage(),
                    'trace'   => $this->originalException->getTrace(),
                ];
            }
        }
        $response = new JsonResponse($data, $this->getStatusCode());
        return $response;
    }
}
