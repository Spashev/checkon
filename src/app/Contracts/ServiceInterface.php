<?php

declare(strict_types=1);

namespace App\Contracts;

interface ServiceInterface
{
    public function all();

    public function create(RequestInterface $request);

    public function delete(RequestInterface $request);
}