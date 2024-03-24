<?php

declare(strict_types=1);

namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Exceptions\FolderNotFoundException;
use App\Exceptions\ViewFileNotFoundException;

class HomeController extends Controller
{
    public function index(): string
    {
        return $this->render('home/index.html');
    }
}