<?php
    class Cars{

        static $wheel_count = 4;

        static function car_detail(){

            return self::$wheel_count;

        }

        
    };

    class Trucks extends Cars {


        static function display() {
            // it is getting the parent of this object. it is the parent constructor. Meaning it calls the construct function 
            echo parent::car_detail();

        }

    }
    Trucks::display();
?>
