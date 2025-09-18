<?php

    session_start();

    $controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Carrinho';
    $action = $_GET['action'] ?? 'listar';

    $controllerFile = 'controllers/' . $controller . 'Controller.php';
    require_once $controllerFile;

    $controllerClass = $controller . 'Controller';
    $controllerObj   = new $controllerClass();
    $controllerObj->$action();


?>