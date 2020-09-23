<?php
class Cars{
    // these are properties
    var $wheel_count = 4;
    var $door_count;

    function car_detail(){
        
        return "This car has {$this->wheel_count} wheel/s";

    }

    function truck_detail(){
        return "This truck has {$this->door_count} doors";
    }
};
// these are instances
$test1 = new Cars();
$test2 = new cars();
$test3 = new Cars();

// you don't have to use the dollar sign after you make a var
$test1->wheel_count;

echo $test1->wheel_count = 20 . "<br>";

// echo $test2->wheel_count . "<br>";
echo $test2->car_detail();
echo "<br>";
// the door count for test3 will be the last instance going from bottm up 
$test3->door_count = 2;
$test3->door_count = 10;

echo $test3->truck_detail();

// echo $test2 below this comment will not work because the object of class car can not be converted into a string since it has been created as a instance
echo $test2;


?>
