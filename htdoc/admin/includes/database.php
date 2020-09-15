<?php 

require_once("new_config.php");

class Database {

    public $connection;
    // created a construct here so we can automactically connect to the database
    function __construct(){

        $this->open_db_connection();

    }

    // created and opened a database connection here
    public function open_db_connection(){

    $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // if an error occurs, the following if statement will be fired below 
    if($this->connection->connect_errno){
        die("Connection to the database has died......." . $this->connection->connect_error);
    }
        
    }

    // this methods peforms a query 
    public function query($sql){
        
        $result = $this->connection->query($sql);
        
        $this->confirm_query($result);
        return $result;
    }
    
    // tested the query here to see if it works
    private function confirm_query($result){
        
        if(!$result){
            die("query failed" . $this->connection->error);
        }
    }

    // this method escapes the special character in the query... For Example("INSERT into myCity (Name) VALUES ('$city')"). The $ sign was ignored in the instance 
    public function escape_string($string){
        $escaped_string = mysqli_real_escape_string($this->connection,$string);
        return $escaped_string;
    }
    
}

// Now we can use this variable anywhere... we have our construct automatically calling open_db_connection to always create and open a database connection 
$database = new Database();


?>