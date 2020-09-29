<?php

class Session{

    private $signed_in = false;
    public $user_id;
    public $user_name;
    public $count = 1;

    function __construct(){
        session_start();
        $this->vistor_count();
        $this->check_the_login();
        $this->check_message();
    }

    public function vistor_count(){
    
        if(isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;
        } else {
            $_SESSION['count'] = 1;
        }


    }

    public function message($msg=''){

        // we are checking to see if this message is empty. if it's not, what ever the session has stored is put into here.
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }

    }

    private function check_message(){
    
        // Here, we are checking if the session is set. If it is, we are grabbing the session message and storing it in the object, else it returns blank
        if (isset($_SESSION['message'])) {
   
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = '';
        }
        
    } 
    


    // this is our getter method 
    public function is_signed_in(){

        return $this->signed_in;
        
    }

    // the paramater is coming from the database and bring the result
    public function login($user){
    
        if($user){
            // here we are assigning two things to the variable. the session to make sure the user is able to go to every page. And the user->id from the object to be able to use in user.php 
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->user_name = $_SESSION['user_name'] = $user->username;
            $this->signed_in = true;
        }
        
    }

    public function logout(){
    
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($this->user_id);
        $this->signed_in = false;

    }



    // in this method, we are checking if they do exist. If they do, the session will be created 
    private function check_the_login(){
        
        if(isset($_SESSION['user_id'])){

            // here we are checking if the session equals to the user_id. Then it's stored into the user_id 
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }

    }
}

$session = new Session();



?>