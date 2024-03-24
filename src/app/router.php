<?php


use App\Abstracts\Request;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $request = new Request();
    $r->addRoute('GET', '/', function () use($request) {
        echo (new \App\Controllers\Home\HomeController())->index($request);
    });
    $r->addRoute('POST', '/add-users', function () use($request) {
        echo (new \App\Controllers\Home\UserController())->create($request);
    });
});
