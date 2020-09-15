<?php 

    class Cars {

        public $wheel_count = 4;
        // static means is doesn't change or move anywhere
        static $door_count = 4;

        // this is how you make a constructor
        // every time we instantiate a class, this construct is called automatically 
        function __construct(){
            // each time the method fires, we get the same wheel count 
            // echo $this->wheel_count;

            // each time the method fires, we get the default door count then it increments each time the method fires 
            echo self::$door_count++;
        }
        function __destruct(){
            echo self::$door_count--;
        }
    }
    // when creating new Cars, it is calling the constructor automatically 
    $bmw = new Cars;
    $mustang = new Cars;
    $supra = new Cars;
    $Cheve = new Cars;

?>