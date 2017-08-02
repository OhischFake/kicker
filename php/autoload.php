<?php 
//Define autoloader 

spl_autoload_register(function ($class_name) {
    if (file_exists(dirname(__FILE__).'/'.$class_name . '.php')) { 
	    require_once $class_name . '.php'; 
	    return true; 
    }
});
