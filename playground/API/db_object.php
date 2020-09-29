<?php

class db_object {
    public static $db_table = 'accounts';
    public static $db_table_field = array('username','password','first_name','last_name','email','age','created_at','deleted_at');



    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE deleted_at is NULL");

    }


    public static function find_all_deleted(){

        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE deleted_at IS NOT NULL");

    }

    public static function find_by_id($id){
        global $database;
        
        $result_array =  static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id");

        // since we are only get a single user, we can pull the data out from the array and return it.. 
        // here we used the ternary opperator to do a singled line if else statement 
        return !empty($result_array) ?  array_shift($result_array) : false;
 
    }


    public static function find_by_query($sql){
    
        global $database;

        // created an empty array 
        $object_array = array();
        $result_set = $database->query($sql);

        // created a loop that fetches the data from the table in the database
        while($row = mysqli_fetch_array($result_set)){
            
            // this is where the key and values of the object are stored. 
            $object_array[] = static::instantation($row);
        }
        return $object_array;


    }
    public static function instantation($the_record){

        // can be used to retrieve a string with the name of the called class and static:: introduces its scope.
        $calling_class = get_called_class();

        $the_object = new $calling_class;


        // doing a loop to get all of the values in the object ]
        foreach($the_record as $key => $value) {

            if($the_object->has_the_key($key)){
                $the_object->$key = $value;
                
            }
        }

        return $the_object;
    }

    private function has_the_key($key){

        // stores the object keys in a var 
        $object_properties = get_object_vars($this);

        // if the key exist in the array, its going to return true 
        return array_key_exists($key,$object_properties);

    }

    protected function properties(){
        global $database;

        $properties = array();
        foreach(static::$db_table_field as $values){
            if(property_exists($this,$values)){
                $properties[$values] = $this->$values;
            }
        }
        return $properties;

    }
    
    public function clean_properties(){
        global $database;

        $clean_properties = array();
        foreach ($this->properties() as $key => $value) {
           $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }



    public function create(){
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$db_table;
        $sql .= " (";
        $sql .= implode(',',array_keys($properties));
        $sql .= ")";
        $sql .= " VALUES ('";
        $sql .= implode("','",array_values($properties));
        $sql .= "')";

        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function delete(){
        global $database;

        $sql = "UPDATE " . static::$db_table. " SET deleted_at=NOW() WHERE id = {$database->escape_string($this->id)}";

        // runs the query then it stores the id in the parameter
        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {

            return false;
        }

         
    }

    public function recover(){
        global $database;

        $sql = "UPDATE " . static::$db_table. " SET deleted_at=NULL WHERE id = {$database->escape_string($this->id)}";

        // runs the query then it stores the id in the parameter
        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {

            return false;
        }

         
    }

    public function update(){
        global $database;

        $properties = $this->clean_properties();
        $property_pair = array();
        foreach ($properties as $key => $value) {
            $property_pair[] = "{$key} ='{$value}' ";

            // in the statement above, we are storing the key and value pair in the array,

            // break down of the array - username = 'this', password = 'that'. then it is place after SET, when you're SETTING  the key value pairs in the sql statement below. A dynamic statement
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ",$property_pair);
        $sql .= " WHERE id=" . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) ==1) ? true : false;
    }

    public static function count_1(){
        global $database;
    
        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE deleted_at is null";

        $result_set = $database->query($sql);

        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }


    public static function count_2(){
        global $database;
    
        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE deleted_at is not null";

        $result_set = $database->query($sql);

        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }
}

?>
