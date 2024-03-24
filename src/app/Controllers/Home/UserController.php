<?php

declare(strict_types=1);

namespace App\Controllers\Home;

use App\Models\User;

class UserController
{
    public function create(): string
    {
        return (new User())->create();
    }
}