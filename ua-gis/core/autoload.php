<?php
    function autoloadClass($name){
        $path = dirname(__DIR__);
        $name_path = str_replace ('\\', '/', $name);
        require_once($path . '/' .$name_path . '.php');
        if (!class_exists($name)){
            throw new Exception ("Controller class $name not found in file: $name.php");
        }
    }

    spl_autoload_register('autoloadClass');