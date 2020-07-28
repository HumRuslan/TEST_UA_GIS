<?php
    require_once('core/autoload_api.php');
    $requestUri=preg_split('/\/|\?/',$_SERVER["REQUEST_URI"]);
    $pathApi = $requestUri[1];
    $nameApi = $requestUri[2];
    $actionApi
    $apiPath = $pathApi.'/' . $nameApi . 'Api.php';
    try
    {
        if (file_exists($apiPath)){
            $Api = new $apiPath;
            echo $api->run();
        } else {
            throw new Exception ("API not found file name: $apiPath");
        }
    } catch (Exception $ex) {
        echo json_encode(['error' => $ex->getMessage()]);
    }