<?php

// this will auto load files that has not been included,, for example.... users.php wasn't incuded in the init file. so function below checked to see if the file exist and if it does... it will load it automactically.

function classAutoLoader($class){

    $class = strtolower($class);
    $the_path = "includes/{$class}.php";


    if(file_exists($the_path)){
        
        require_once($the_path);
    }  else {
        die("this file name {$class}.php was not found");
    }

}

function redirect($location){

    header("Location: {$location}");


}

// spl_autoload_register('classAutoLoader')

?>