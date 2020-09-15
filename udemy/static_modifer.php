<?php
    class Cars{
        // these are properties
        
        // Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. A property declared as static cannot be accessed with an instantiated class object (though a static method can).
        static $wheel_count = 4;

        static $door_count = 4;


        static function car_detail(){
            // it's is only used when there's an instance, (this) will not work with static properties
            // echo $this->wheel_count;
            // echo $this->door_count;

            echo "here are the static properties";
            echo "<br>";
            echo Cars::$wheel_count;
            echo "<br>";
            echo Cars::$door_count;

        }

        
    };
    $bmw = new Cars();

    // this is how you can access a static property. It can not be accessed without an instantiated class object
    echo Cars::$door_count;
    echo "<br>";

    echo Cars::car_detail();

    // this is not how you access it 
    // echo $bmw->door_count;

?>
