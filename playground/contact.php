<?php

class contact extends db_object{

    public static $db_table = 'contacts';
    public static $db_table_field = array('name','email','text');

    public $name; 
    public $email;
    public $text;


    public function support_form(){
    
        return $this->create();
    }

}



?>