<?php

declare(strict_types=1);

namespace App\Abstracts;

use App\Contracts\RequestInterface;

class Request implements RequestInterface
{
    public function get($field = null) 
    {
        return $this->toArray()[$field] ?? null;
    }
    
    public function toArray(): array
    {
        return json_decode($this->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
    
    public function validateRequiredFields($data): bool
    {
        $params = $this->toArray();

        $fieldRules = [];
        foreach($data as $key => $value) {
            $fieldRules[$key] = explode('|', $value);
        }
        
        foreach($fieldRules as $key => $fieldRule) {
            foreach($fieldRule as $rule) {
                $this->validateRequired($rule, $params, $key);
                $this->validateMin($rule, $params[$key], $key);
                $this->validateEmail($rule, $params[$key], $key);
            }
        }
        
        return true;
    }

    public function getBody(): string|false
    {
        return file_get_contents('php://input');
    }

    public function validateEmail(mixed $rule, $params, int|string $key): bool
    {
        if ($rule === 'email' && !filter_var($params, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Field $key must be email address");
        }

        return true;
    }
    
    public function validateMin(mixed $rule, $params, int|string $key): bool
    {
        if (str_contains($rule, 'min')) {
            $minValue = explode(':', $rule);
            if (mb_strlen($params) < $minValue[1]) {
                throw new \Exception("Field $key min must be $minValue[1]");
            }
        }

        return true;
    }
    
    public function validateRequired(mixed $rule, array $params, int|string $key): bool
    {
        if ($rule === 'required' && !isset($params[$key])) {
            throw new \Exception("Required field $key");
        }
        
        return true;
    }
}