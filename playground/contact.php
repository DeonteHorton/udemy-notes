<?php

class contact extends db_object{

    public static $contacts = 'contacts';
    public static $contacts_field = array('name','email','text');

    public $name; 
    public $email;
    public $text;



}



?>