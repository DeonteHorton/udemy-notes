<?php 
//database connection constants
// same as creating a pool for an api in javascript... must get the localhost,user,password,and the DB name.
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","graphic_umbrella");
// the defines above let's us pass it through the params
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if($connection){
//     echo "Connection successful";
// } else {
//     echo "ERROR: NOT CONNECTED!";
// }


?>