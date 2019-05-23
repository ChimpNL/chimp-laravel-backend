<?php namespace Chimp\Laravel\Exceptions;


class InvalidRequestException extends ChimpApiException
{
    protected $statusCode = 400;
}