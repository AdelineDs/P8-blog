<?php

class Autoloader {
    
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    public static function autoload($class){
        $directory = array('Model/', 'Controller/', 'View/');
        $class = str_replace('AdelineD\OC\P8\Controller\\', '', $class);
        $class = str_replace('AdelineD\OC\P8\Model\\', '', $class);
        $class = str_replace('AdelineD\OC\P8\View\\', '', $class);
        $class = str_replace('\\', '/', $class);
        foreach ($directory as $current_dir){
            $file = $current_dir . $class . '.php';
            if(file_exists($file)){
                require_once $file;
                return;
            }
        }
    }
}