<?php


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', function () {
        echo (new App\Controllers\Home\HomeController())->index();
    });
    $r->addRoute('POST', '/add-users', function () {
        echo (new \App\Controllers\Home\UserController())->create();
    });
});
