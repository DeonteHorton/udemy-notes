<?php
class Cars{
    
    var $wheels = 4;
    
    function gretting(){
        return "hello";
    }
};
    $bmw = new Cars();

    // here, we are extends the class trucks to get anything from the class Cars
    class Trucks extends Cars{
        // can overide the other variable created in the class Cars
        // var $wheels = 10;
    }
    $tocoma = new Trucks;
    echo "<h1 style=\"color:red;\" class=\"test\">" . $tocoma->wheels . "</h1>";
?>
