<?php

declare(strict_types=1);

namespace App\Controllers\Home;

use App\Abstracts\Request;
use App\Models\User;

final class UserController
{
    private ?User $model = null;
    public function __construct()
    {
        $this->model = new User();    
    }
    
    public function create(Request $request): string
    {
        $request->validateRequiredFields([
            'email' => 'required|email|min:3',
            'name' => 'required|min:3',
        ]);
        return $this->model->create($request);
    }
}