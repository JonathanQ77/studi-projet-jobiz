<?php

namespace App\Routing;

use App\Controller\ErrorController;
use Exception;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = require APP_ROOT . '/config/routes.php';
    }

    public function handleRequest(string $uri) // permet de récuperer l'uri et la route'
    {
        try {
            $path = self::normalizePath($uri);
            if (!isset($this->routes[$path])) { // si la route n'existe pas'
                throw new Exception("La route n'existe pas");
            }
            $routes = $this->routes[$path];


            // appeler le controller et l'action correspondant'
            $controllerPath = $routes['controller'];
            $action = $routes['action'];
            // on instancie le controller et on appelle l'action'

            if (!class_exists($controllerPath)) { // si le controller n'existe pas'
                throw new Exception("Le controller n'existe pas");
            }
            $controller = new $controllerPath();
            if (!method_exists($controller, $action)) { // si l'action n'existe pas'
                throw new Exception("L'action n'existe pas");
            }
            $controller->$action();
        } catch (\Exception $e) { // affiche le composant d'erreur et affiche l'erreur selon le cas
            $errorController = new ErrorController();
            $errorController->show($e->getMessage());

        }


    }

    public static function normalizePath(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, '/') . "/";
        return $path;
    }

}