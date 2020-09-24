<?php

class db_object {
    protected static $table_contacts = 'contacts';
    protected static $contacts_field = array('name','email','txt');

    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$table_contacts);

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
        foreach(static::$contacts_field as $values){
            if(property_exists($this,$values)){
                $properties[$values] = $this->values;
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

        $sql = "INSERT INTO " . static::$table_contacts;
        $sql .= " ('" . implode(',',array_keys($properties)) . "') ";
        $sql .= "VALUES ('" . implode(',',array_values($properties)) . "')";

        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

}

?>
