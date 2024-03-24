<?php

declare(strict_types=1);

namespace App\Services;

use App\Abstracts\Request;
use App\Models\User;

class UserService
{
    private ?User $model = null;
    public function __construct()
    {
        $this->model = new User();
    }
    
    public function all(Request $request): bool|string
    {
        return json_encode($this->model->all(), JSON_THROW_ON_ERROR);
    }
    
    public function create(Request $request): bool|string
    {
        $request->validateRequiredFields([
            'email' => 'required|email|min:3',
            'username' => 'required|min:3',
        ]);
        $userId = $this->model->create($request->toArray());
        
        return json_encode($request->toArray() + ['id' => $userId], JSON_THROW_ON_ERROR);
    }
    
    public function delete(Request $request): bool
    {
        return $this->model->where(['id' => $request->get('id')])->delete();
    }
}