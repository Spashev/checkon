<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class FolderNotFoundException extends Exception
{
    public function __construct($folderPath, $code = 0, Exception $previous = null)
    {
        $message = "Folder not found at path: $folderPath";
        parent::__construct($message, $code, $previous);
    }
}