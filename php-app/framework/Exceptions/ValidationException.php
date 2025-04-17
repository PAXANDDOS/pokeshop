<?php

namespace  Framework\Exceptions;

/**
 * Exception for non-valid fields.
 */
class ValidationException extends \Exception
{
    protected $message;

    public function __construct(string $message)
    {
        $this->message = $message;
        parent::__construct();
    }

    public function __toString()
    {
        error_log(\Framework\Handler::formatLog("Exception", $this->message, $this->getFile(), $this->getLine()), 3, APP_LOG);
        return "<b>You have validation error in your fields:</b> $this->message";
    }
}
