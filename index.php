<?php

session_start();

require __DIR__. '/vendor/autoload.php';



$url = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

$path = parse_url($url, PHP_URL_PATH);

$diContainer = \Framework\DI\DiContainer::instance();
$resolver = $diContainer->controller($requestMethod, $path);

$actionResult = \Framework\Http\Response::send("accueil/index");
if ($resolver) {
    list("ctrl" => $ctrl, "action" => $action) = $resolver;

    $actionResult = $ctrl->$action();
}

$actionResult->display();






