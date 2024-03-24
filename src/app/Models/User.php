<?php

declare(strict_types=1);

namespace App\Models;

use App\Abstracts\ModelAbstract;

class User extends ModelAbstract
{
    protected string $table = 'users';
    
    public function create() 
    {
        return 'get users';
    }
}