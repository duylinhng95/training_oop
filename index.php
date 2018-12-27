<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('database.php');
        
    if (isset($_GET['controller'])){
        $controller = $_GET['controller'];
        if (isset($_GET['action']))
        {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }
    } else {
        $controller = 'page';
        $action = 'home';
    }

    $controllers = [
        'page' => ['home', 'error'],
        'user' => ['get', 'add', 'save', 'edit', 'update', 'destroy']
    ];

    
    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])){
        $controller = 'page';
        $action = 'error';
    }



    include_once('controller/' . ucwords($controller) . 'Controller.php');

    $class = str_replace('_', '', ucwords($controller).'Controller');
    $controller = new $class;
    $controller->$action();
?>