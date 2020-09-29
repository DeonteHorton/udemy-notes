<?php

// this class is universal, all other files that uses a table can access the sql statements here.

class db_object {

    public  $upload_errors = array(

        UPLOAD_ERR_OK         =>  "There is no error",
        UPLOAD_ERR_INI_SIZE   =>  "Bigger then the upload_max_size directive",
        UPLOAD_ERR_FORM_SIZE  =>  "The uploaded file exceeds the upload_max_file_size",
        UPLOAD_ERR_PARTIAL    =>  "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    =>  "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR =>  "Missing a temporary folder. Introduced in PHP 5.0.3",
        UPLOAD_ERR_CANT_WRITE =>  "Failed to write file to disk. Introduced in PHP 5.1.0",
        UPLOAD_ERR_EXTENSION  =>  "A PHP extension stopped the file upload"
    );

    protected static $table_users = "users";
    protected static $table_users_field = array('id','username','password','first_name','last_name','user_image');


    // these methods are public, it can be used through out the whole project 

    // This method runs a MySQL statement that finds all the users 
    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$table_users);

    }


    // This method runs a MySQL statement that finds a single user by id 
    public static function find_by_id($id){
        global $database;
        
        $result_array =  static::find_by_query("SELECT * FROM " . static::$table_users . " WHERE id = $id");

        // since we are only get a single user, we can pull the data out from the array and return it.. 
        // here we used the ternary opperator to do a singled line if else statement 
        return !empty($result_array) ?  array_shift($result_array) : false;
 
    }

    // this method makes the query for us. All of the sql statement can be passed through this method 
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

       // here we are instantating our object 
    // it loops though the columns and assigns the data into certain object properties 

    // the paramater(table values/ data from the DB) in find_by_query method is being passed down to this method
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

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    // this method checks to see if there's a key that exists 
    protected function properties(){

        // Here we are making an array, we are looping through the table to see if the fields in the table exist, if so. It is being stored into array   
        $properties = array();
        foreach (static::$table_users_field as $users_field) {
            if(property_exists($this,$users_field)){
                $properties[$users_field] = $this->$users_field;
            }
        }

        return $properties;
    }

      // this is a method that cleans the values, it escapes the statement in cases of sql injections and etc s
      protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {

            // the value is being escaped in cases of sql injections and etc.it is also being paired with the key 
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    // this is our create method, here we are making a query to take the users input from the form and store it into the database
    public function create(){
        global $database;

        // When we call a method, this will have all the object properties
        $properties = $this->clean_properties();

        // Implode - Defaults to an empty string. This is not the preferred usage of implode as glue would be the second parameter and thus, the bad prototype would be used.

        // Here, everytime this method runs, it will pull a key value and place a comma after it.Then it is stored in an array so it can be used in the values
        $sql = "INSERT INTO " . static::$table_users . " ( " .  implode("," , array_keys($properties)) .")";

        $sql .= "VALUES ('" . implode("','" , array_values($properties)) ."')";

        // Break down of the slq statement above - INSERT INTO users (username,password,first_name,last_name) VALUES ('deonte','password',//'Deonte','Horton')


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

        $sql = "UPDATE " . static::$table_users . " SET ";
        $sql .= implode(", ",$property_pair);
        $sql .= " WHERE id=" . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) ==1) ? true : false;

    }

    public function delete(){
        global $database;
        $sql = "DELETE FROM " . static::$table_users . " WHERE id =" . $database->escape_string($this->id);


        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {

            return false;
        }

    }
    
}

?>