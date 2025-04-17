<?php

namespace  Framework\Exceptions;

/**
 * Exception for if something is missing.
 */
class NotFoundException extends \Exception
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
        return "<b>An error has occured:</b> $this->message";
    }
}
