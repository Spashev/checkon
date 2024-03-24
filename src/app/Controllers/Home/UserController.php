<?php

declare(strict_types=1);

namespace App\Controllers\Home;

use App\Abstracts\Request;
use App\Services\UserService;

final class UserController
{
    private UserService|null $service = null;
    
    public function __construct()
    {
        $this->service = new UserService();    
    }
    
    public function index(Request $request): string
    {
        return $this->service->all($request);
    }
    
    public function create(Request $request): string
    {
        return $this->service->create($request);
    }
    
    public function delete(Request $request): bool
    {
        return $this->service->delete($request);
    }
}