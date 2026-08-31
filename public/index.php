<?php

require __DIR__ . '/../vendor/autoload.php';
// définition de la constante pour le chemin vers le dossier public
define('APP_ROOT', dirname(__DIR__));

use App\Routing\Router;

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
