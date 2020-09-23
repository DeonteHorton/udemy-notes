<?php
class user extends db_object{

    // Here we are making the table users protected, it can be used everywhere else, an example: the create method can be used in another class. The methods will become accessible
    protected static $table_users = "users";
    protected static $table_users_field = array('username','password','first_name','last_name','user_image');


    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = 'images';
    public $image_placeholder = 'http://placehold.it/400x400&text=USER';



    
    public static function verify_user($username,$password){
        global $database;

        // here we are escaping the dollar sign with the method that we created in database.php 
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);


        // here we created a multi line sql statement and ran it through the query 
        $sql = " SELECT * FROM " . self::$table_users . " WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= " LIMIT 1";


        $result_array =  self::find_by_query($sql);

        return !empty($result_array) ?  array_shift($result_array) : false;

    
    }



    public function user_image(){

        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;

    }



  

   

  

    
    


} //End of user class 


?>