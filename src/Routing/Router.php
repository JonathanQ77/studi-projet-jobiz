<?php

namespace App\Routing;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = require APP_ROOT . '/config/routes.php';
    }

    public function handleRequest(string $uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, '/') . "/";
        echo $path;

    }

}