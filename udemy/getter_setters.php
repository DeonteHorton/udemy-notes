<?php
class Cars{
    
    Private $door_count = 4;
    
    function get_values(){
        // once the value has been set, we are grabbing the value here and will have it output to the screen 
        echo $this->door_count;
    }
    
    function set_values(){
        // here we are overiding the value and changin it to a new value 
        $this->door_count = 10;
    }
};
    $bmw = new Cars();
    // we set the value here 
    $bmw->set_values();

    // here we are getting the new value and it is being displayed on the screen 
    $bmw->get_values();
    echo "<br>";

 
?>
