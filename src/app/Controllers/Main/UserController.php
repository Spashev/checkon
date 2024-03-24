<?php

declare(strict_types=1);

namespace App\Controllers\Main;

use App\Contracts\RequestInterface;
use App\Contracts\ServiceInterface;

final class UserController
{
    public function __construct(private ServiceInterface $service)
    {
    }
    
    public function index(RequestInterface $request): string
    {
        return $this->service->all($request);
    }
    
    public function create(RequestInterface $request): string
    {
        return $this->service->create($request);
    }
    
    public function delete(RequestInterface $request): bool
    {
        return $this->service->delete($request);
    }
}