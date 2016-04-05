<?php

class Loader
{
    public function __construct(){
        spl_autoload_register(['self', 'loadClass']);
    }

    public function LoadClass($class)
    {
        $file = BASE_PATH . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';


        if(is_file($file)){
            require_once $file;
        }
    }
}
