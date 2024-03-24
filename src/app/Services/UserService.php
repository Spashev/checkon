<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\RequestInterface;
use App\Contracts\ServiceInterface;
use App\Models\User;

class UserService implements ServiceInterface
{
    private ?User $model = null;
    private ?CalculateService $calculate = null;
    public function __construct()
    {
        $this->model = new User();
        $this->calculate = new CalculateService();
    }
    
    public function all(): bool|string
    {
        return json_encode($this->model->all(), JSON_THROW_ON_ERROR);
    }
    
    public function create(RequestInterface $request): bool|string
    {
        $request->validateRequiredFields([
            'email' => 'required|email|min:3',
            'username' => 'required|min:3',
        ]);
        
        $userId = $this->model->create($request->toArray());
        $total = $this->calculate->run($this->model->all());
        $this->model->update(['total' => $total]);
        
        return json_encode($request->toArray() + ['id' => $userId, 'total' => $total], JSON_THROW_ON_ERROR);
    }
    
    public function delete(RequestInterface $request): bool
    {
        $result = $this->model->where(['id' => $request->get('id')])->delete();
        $total = $this->calculate->run($this->model->all());
        $this->model->update(['total' => $total]);
        
        return $result;
    }
}