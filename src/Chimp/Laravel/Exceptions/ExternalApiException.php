<?php namespace Chimp\Laravel\Exceptions;


class ExternalApiException extends ChimpApiException
{
    protected $statusCode = 500;
}