<?php
    function autoloadAPI($name){
        $name_path = str_replace ('\\', '/', $name);
        require_once($name_path . '.php');
        if (!class_exists($name)){
            throw new Exception ("Controller class $name not found in file: $name.php");
        }
    }

    spl_autoload_register('autoloadAPI');