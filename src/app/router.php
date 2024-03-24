<?php


use App\Abstracts\Request;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $request = new Request();
    $r->addRoute('GET', '/', function () use($request) {
        echo (new \App\Controllers\Home\HomeController())->index($request);
    });
    $r->addRoute('GET', '/users', function () use($request) {
        echo (new \App\Controllers\Home\UserController())->index($request);
    });
    $r->addRoute('POST', '/users', function () use($request) {
        echo (new \App\Controllers\Home\UserController())->create($request);
    });
    $r->addRoute('DELETE', '/users', function () use($request) {
        echo (new \App\Controllers\Home\UserController())->delete($request);
    });
});
