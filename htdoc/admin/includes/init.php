<?php 

// here we are checking if the constant exist. if it doesn't, it will created into one
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
// we are defining the site root of the site. we are getting the current directory path 
define('SITE_ROOT', 'C:'.DS. 'laragon' . DS . 'www' .DS. 'htdoc');
// Here we including the main source of the folder 
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS .'includes');

// C:\laragon\www\htdoc\admin\includes

require_once "new_config.php";
require_once "database.php";
require_once "db_object.php";
require_once "photo.php";
require_once "user.php";
require_once "functions.php";
require_once "session.php";

?>