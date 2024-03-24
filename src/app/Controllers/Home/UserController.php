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
    
    public function index(Request $request): string
    {
        return json_encode($this->model->all(), JSON_THROW_ON_ERROR);
    }
    
    public function create(Request $request): bool
    {
        $request->validateRequiredFields([
            'email' => 'required|email|min:3',
            'username' => 'required|min:3',
        ]);

        return $this->model->create($request->toArray());
    }
    
    public function delete(Request $request): bool
    {
        $request->validateRequiredFields([
            'id' => 'required',
        ]);

        return $this->model->where(['id' => $request->get('id')])->delete();
    }
}