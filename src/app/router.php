<?php

use App\Abstracts\Request;
use App\Controllers\Main\HomeController;
use App\Controllers\Main\UserController;
use App\Services\UserService;


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $request = new Request();
    $service = new UserService();
    $r->addRoute('GET', '/', function () use ($request) {
        echo (new HomeController())->index($request);
    });
    $r->addRoute('GET', '/users', function () use ($request, $service) {
        echo (new UserController($service))->index($request);
    });
    $r->addRoute('POST', '/users', function () use ($request, $service) {
        echo (new UserController($service))->create($request);
    });
    $r->addRoute('DELETE', '/users', function () use ($request, $service) {
        echo (new UserController($service))->delete($request);
    });
});
