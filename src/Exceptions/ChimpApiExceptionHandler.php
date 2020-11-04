<?php namespace Chimp\Laravel\Exceptions;

use \Exception;

class ChimpApiExceptionHandler {

    public function handle(Exception $e)
    {
        if ($e instanceof ChimpApiException) {
            return $e->getApiResponse();
        }
    }
}