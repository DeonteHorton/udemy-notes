<?php

class account extends db_object{

    public static $db_table = 'accounts';
    public static $db_table_field = array('username','password','first_name','last_name','email','age');

    public $id; 
    public $username; 
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $age;
    public $created_at;
    public $delete_at;


    public static function verify_user($username,$password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "username = '{$username}' AND password = '{$password}'";

        $result_array = self::find_by_query($sql);

        return !empty($result_array) ? array_shift($result_array) : false;

    }

}



?>