<?php

class db_object {
    protected static $db_table = 'contact';
    protected static $db_table_fields = array('name','email','txt');

    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$db_table);

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
}

?>
