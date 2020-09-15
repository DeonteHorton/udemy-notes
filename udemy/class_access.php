<?php
class Cars{
    // these are properties

    // public means is becomes global, it can be use through out the whole program
    public $wheel_count = 4;
    // private means its only avaliable within its scope, it can't be access in outside anywhere else
    private $door_count = 2;
    // if it's within a scope, it can only be access in other scope for example class cars, you can extend it to another class
    protected $seat_count = 4;


    function car_detail(){
        
        echo $this->wheel_count;
        echo $this->door_count;
        echo $this->seat_count;


    }

    
};
$bmw = new Cars();
// can be access
// echo $bmw->wheel_count;

// can't be access because it's private, will throw a fatal error 
// echo $bmw->door_count;

// can't be access because it's protected, will throw a fatal error 
// echo $bmw->seat_count;

echo $bmw->car_detail();


?>
