<?php
    require_once('../core/autoload.php');
    $requestUri=preg_split('/\/|\?/',$_SERVER["REQUEST_URI"]);
    $controllerName = !isset($requestUri[1]) ? 'post' : $requestUri[1] === '' ? 'post' : strtolower($requestUri[1]);
    $actionName = !isset($requestUri[2]) ? 'index' : $requestUri[2] === '' ? 'index' : strtolower($requestUri[2]);
    $controllerPath = '../frontend/controllers/' . $controllerName . 'Controller.php';
    try
    {
        if (file_exists($controllerPath)){
            $controllerClassName = '\\frontend\\controllers\\' . $controllerName . 'Controller';
            $controller = new $controllerClassName;
            $actionClassMethodName = $actionName . 'Action';
            if (method_exists($controller, $actionClassMethodName)){
                $controller->$actionClassMethodName();
            } else {
                throw new Exception ("Method $actionClassMethodName in controller class $controllerClassName not found in file: $controllerPath");
            }
        } else {
            throw new Exception ("Controller file not found file name: $controllerPath");
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }