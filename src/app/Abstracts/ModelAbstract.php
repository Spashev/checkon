<?php

declare(strict_types=1);

namespace App\Abstracts;

abstract class ModelAbstract extends MysqlConnectorAbstract
{
    public function __construct()
    {
        $this->connect();
    }
    
    protected string $table = '';
}