<?php

use App\Routing\Router;

require __DIR__ . '/../vendor/autoload.php';
// définition de la constante pour le chemin vers le dossier public
define('APP_ROOT', dirname(__DIR__));
// définir une constante pour le chemin vers le .env
const APP_ENV = ".env.local";

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);


