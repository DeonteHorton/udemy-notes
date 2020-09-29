<?php

class contact extends db_object{

    public static $db_table = 'contacts';
    public static $db_table_field = array('name','email','text');

    public $id;
    public $name; 
    public $email;
    public $text;
    public $deleted_at;


    public function support_form(){
    
        return $this->create();
    }

}



?>