<?php

declare(strict_types=1);

namespace App\Models;

use App\Abstracts\ModelAbstract;

final class User extends ModelAbstract
{
    protected string $table = 'users';
}