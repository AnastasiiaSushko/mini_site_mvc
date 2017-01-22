<?php

require_once 'includes.php';
require_once 'settings.php';

session_start();

$controller = 'Index';
$action = 'index';
$parameters = null;

if(isset($_GET['route'])){
    $route = explode('/',$_GET['route']);
    if(isset($route[0])){
        $controller = $route[0];
    }
    if(isset($route[1])){
        $action = $route[1];
    }
    if (isset($route[2])){
        $parameters = $route[2];
    }
}

$controllerName = "\\Controller\\{$controller}Controller";
$controlObject = new $controllerName();

// Проверка action
if(is_callable(array($controlObject, $action))){
    $controlObject->$action($parameters);
}else{

    $controlObject->index($parameters);
}


