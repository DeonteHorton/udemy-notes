<?php

class photo extends db_object{
    protected static $table_users = "photo";
    protected static $table_users_field = array('title','caption','description','file_name','alternate_text','file_type','size');


    public $id;
    public $title;
    public $caption;
    public $description;
    public $file_name;
    public $alternate_text;
    public $file_type;
    public $size;

    public $tmp_path;
    public $custom_errors = array();
    public $directory = "images";

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


    // this is passing $_FILES['uploaded_file'] as an argument 

    // this method is setting up the file, if there are no errors, it will be passed on to the save method 
    public function set_file($file){
    
        // we are assigning the key to the object property file name 
        // basename will just return the file name instead of the path 

        if (empty($file) || !$file || !is_array($file) ) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } else if ($file['error'] != 0){
            // if there is an error, it will be stored in the array 
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {

            $this->file_name = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->file_type = $file['type'];
            $this->size = $file['size'];


        }

        
        
    }


    public function picture_path(){
        return $this->directory.DS.$this->file_name;
    
    }

    public function save(){
    
        if($this->id){

            $this->update();

        } else {

            // if this runs and stops, that means we have an error 
            if(!empty($this->errors)){
                return false;
            }


            // this checks for if the file name or the path is empty 
            if(empty($this->file_name) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available";
                return false;
            }

            // this is the current target path, wrote the rest of the code in init.php 
            $target_path = SITE_ROOT . DS . 'admin'. DS . $this->directory . DS . $this->file_name;

            // this checksif the path exists
            if(file_exists($target_path)){
                $this->errors[] = "the file {$this->filename} already exists";
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
    }

    public function delete_photo(){
    
        if($this->delete()){
            $target_path = SITE_ROOT.DS. 'admin' .DS.$this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

}

?>