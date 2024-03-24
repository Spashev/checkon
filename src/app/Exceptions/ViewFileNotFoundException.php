<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ViewFileNotFoundException extends Exception
{
    public function __construct($view, $code = 0, Exception $previous = null)
    {
        $message = "View file not found: $view";
        parent::__construct($message, $code, $previous);
    }
}