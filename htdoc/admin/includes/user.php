<?php
class user{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    
    // these methods are public, it can be used through out the whole project 

    // This method runs a MySQL statement that finds all the users 
    public static function find_all_users(){

        return self::find_this_query("SELECT * FROM users");

    }


    // This method runs a MySQL statement that finds a single user by id 
    public static function find_user_by_id($id){
        global $database;
        
        $result_array =  self::find_this_query("SELECT * FROM users WHERE id = $id");

        // since we are only get a single user, we can pull the data out from the array and return it.. 
        // here we used the ternary opperator to do a singled line if else statement 
        return !empty($result_array) ?  array_shift($result_array) : false;

    }



    // this method makes the query for us. All of the sql statement can be passed through this method 
    public static function find_this_query($sql){
        global $database;

        // created an empty array 
        $object_array = array();
        $result_set = $database->query($sql);

        // created a loop that fetches the data from the table in the database
        while($row = mysqli_fetch_array($result_set)){
            
            // this is where the key and values of the object are stored. 
            $object_array[] = self::instantation($row);
        }
        return $object_array;

    }

    
    public static function verify_user($username,$password){
        global $database;

        // here we are escaping the dollar sign with the method that we created in database.php 
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);


        // here we created a multi line sql statement and ran it through the query 
        $sql = " SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= " LIMIT 1";


        $result_array =  self::find_this_query($sql);

        return !empty($result_array) ?  array_shift($result_array) : false;

    
    }


    // here we are instantating our object 
    // it loops though the columns and assigns the data into certain object properties 

    // the paramater(table values/ data from the DB) in find_this_query method is being passed down to this method
    public static function instantation($the_record){

        $the_object = new self;

        // $the_object->username = $found_user_id['username'];
        // $the_object->password = $found_user_id['password'];
        // $the_object->first_name = $found_user_id['first_name'];
        // $the_object->last_name = $found_user_id['last_name'];

        // doing a loop to get all of the values in the object ]
        foreach($the_record as $key => $value) {

            if($the_object->has_the_key($key)){
                $the_object->$key = $value;
                
            }
        }

        return $the_object;
    }



    // this method checks to see if there's a key that exists 
    private function has_the_key($key){

        // stores the object keys in a var 
        $object_properties = get_object_vars($this);

        // if the key exist in the array, its going to return true 
        return array_key_exists($key,$object_properties);

    }
}


?>