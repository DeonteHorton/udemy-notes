<?php
class user extends db_object{

    // Here we are making the table users protected, it can be used everywhere else, an example: the create method can be used in another class. The methods will become accessible
    protected static $db_table = "users";
    protected static $db_table_field = array('username','password','first_name','last_name','user_image');


    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = 'images';
    public $image_placeholder = 'http://placehold.it/400x400&text=USER';

    public $custom_errors = array();
    public $upload_errors = array(

        UPLOAD_ERR_OK         =>  "There is no error",
        UPLOAD_ERR_INI_SIZE   =>  "Bigger then the upload_max_size directive",
        UPLOAD_ERR_FORM_SIZE  =>  "The uploaded file exceeds the upload_max_file_size",
        UPLOAD_ERR_PARTIAL    =>  "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    =>  "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR =>  "Missing a temporary folder. Introduced in PHP 5.0.3",
        UPLOAD_ERR_CANT_WRITE =>  "Failed to write file to disk. Introduced in PHP 5.1.0",
        UPLOAD_ERR_EXTENSION  =>  "A PHP extension stopped the file upload"
    );


    public function set_file($file){
    
        // we are assigning the key to the object property file name 
        // basename will just return the file name instead of the path 

        if (empty($file) || !$file || !is_array($file) ) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } else if ($file['error'] != 0){
            // if there is an error, it will be stored in the array 
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {

            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->file_type = $file['type'];
            $this->size = $file['size'];


        }
        
    }

    public function save_user_and_image(){


            // if this runs and stops, that means we have an error 
            if(!empty($this->errors)){
                return false;
            }


            // this checks for if the file name or the path is empty 
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available";
                return false;
            }

            // this is the current target path, wrote the rest of the code in init.php 
            $target_path = SITE_ROOT . DS . 'admin'. DS . $this->upload_directory . DS . $this->user_image;

            // this checksif the path exists
            if(file_exists($target_path)){
                $this->errors[] = "the file {$this->user_image} already exists";
                return false;
            }

            // this moves the file if there were no errors 
            if(move_uploaded_file($this->tmp_path, $target_path)){

                // if it is created, it will unset the temporary path and return true 
                if($this->create()){

                    unset($this->tmp_path);
                    return true;

                }
                // if there where no errors but the file won't upload, it's most likely the folder permissions 
            } else {

                $this->errors[] = "The file directory probably does not have permission";

            }


            $this->create();
    
    }

    
    public static function verify_user($username,$password){
        global $database;

        // here we are escaping the dollar sign with the method that we created in database.php 
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);


        // here we created a multi line sql statement and ran it through the query 
        $sql = " SELECT * FROM " . self::$db_table . " WHERE ";
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