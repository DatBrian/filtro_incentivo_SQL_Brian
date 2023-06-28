<?php

require_once "../vendor/autoload.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

$router = new \Bramus\Router\Router();


$routes = glob(__DIR__ . '/../scripts/routes/*.php');

foreach ($routes as $route) {
    $fileName = basename($route, '.php');
    $className = "\App\\" . $fileName;
    $className::getInstance()->configureRoutes($router);
}


$router->run();

?>