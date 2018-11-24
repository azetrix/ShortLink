<?php

namespace ShortLink;

class ErrorHandler
{

    public $error_dump;

    public function error_out(string $message) { // all errors attributed to this method should not be critical or fatal
        trigger_error($message); // this thing logs the error into the webserver's error log 
        $this->error_dump[] = $message; // dumps the error for the user to evaluate
    }

}