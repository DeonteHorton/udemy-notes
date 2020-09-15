<?php

// shows the path with the file
echo __FILE__ . "<br>";
// show what line this echo is currently on 
echo __LINE__ . "<br>";
// shows the path with only the folder
echo __DIR__ . "<br>";

// checks if the file exists in the directory 
// if(file_exists(__DIR__)){
    
//     echo 'Exist:yes' . '<br>';

// }

echo file_exists((__DIR__)) ? 'Exist:yes' . '<br>' : false;


// if(is_file(__DIR__)){

//     echo 'is file:yes' . '<br>';

// } else {

//     echo 'is file: no' . '<br>';

// }

echo is_file(__DIR__) ?  'is file: yes' . '<br>' : 'is file: No' . '<br>';


// if(is_dir(__DIR__)){

//     echo 'DIR:yes' . '<br>';

// } else {

//     echo 'DIR:no' . '<br>';

// }

echo is_dir(__DIR__) ?  'is dir: yes' . '<br>' : 'is dir: No' . '<br>';

?>