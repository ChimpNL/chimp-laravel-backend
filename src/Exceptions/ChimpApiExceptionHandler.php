<?php namespace Chimp\Laravel\Exceptions;


class ChimpApiExceptionHandler {

    public function handle(\Throwable $e)
    {
        if ($e instanceof ChimpApiException) {
            return $e->getApiResponse();
        }
    }
}