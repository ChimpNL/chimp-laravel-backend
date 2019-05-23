# Chimp Laravel Backend

Include this repo to streamline code in Chimp Laravel projects.


## Classes

### Chimp API Exceptions

Throw a class that extends ChimpApiException to normalize the way 
errors are reports. Use the public message to give a user friendly error (for use in the frontend). And optionally use
the private message to communicate more detailed (developer only) messages. These will only be shown when the Laravel
App is in debug mode.

#### How to install

-  Paste the handler in the Laravel global Error handler
```$php
// File: app/Exceptions/Handler.php
public function render($request, Exception $exception)
{
    /*
     * Add this code
     */
    if ($request->expectsJson()) {
        $apiExceptionHandler = new ChimpApiExceptionHandler();
        if ($response = $apiExceptionHandler->handle($exception)) {
            return $response;
        }
    }
    /*
     * End code
     */
    return parent::render($request, $exception);
}
``` 

- Throw the ChimpApiException
```$php
$apiException = new ExternalApiException("Bad request invalid interval parameter: '$interval'.", "For parameter interval please use one of these options: [week | month | year]");
$apiException->setStatusCode(400);
throw $apiException;

/* ------ Or use the static method to create an instance --------------- /*




``` 