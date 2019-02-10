<?php namespace Chimp\Laravel\Exceptions;


class InvalidInputException extends ChimpApiException
{
    protected $statusCode = 400;
}