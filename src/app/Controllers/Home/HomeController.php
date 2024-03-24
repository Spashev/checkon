<?php

declare(strict_types=1);

namespace App\Controllers\Home;

use App\Abstracts\Request;
use App\Controllers\Controller;

final class HomeController extends Controller
{
    public function index(Request $request): string
    {
        return $this->render('home/index.html');
    }
}