<!-- ~~~~~ Upload file structures~~~~ -->
 <!-- keys in the associative array
 name - file name
 type - jpg,png,gif,doc,txt
 size - in bytes
 -- temp name is usually saved in a temporary place in the server then it's moved to a permant place
 tmp_name - temporary name
 
 error - the error code -->


 <?php
 echo "<h1 style='font-size:48px;'>File Uploader</h1>";
if(isset($_POST['submit'])){

    // print_r its going to print the value and the keys of the array
    // echo '<pre>';
    // print_r($_FILES['file_upload']);
    // echo '</pre>';

    $upload_errors = array(

        UPLOAD_ERR_OK         =>  "There is no error",
        UPLOAD_ERR_INI_SIZE   =>  "Bigger then the upload_max_size directive",
        UPLOAD_ERR_FORM_SIZE  =>  "The uploaded file exceeds the upload_max_file_size",
        UPLOAD_ERR_PARTIAL    =>  "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    =>  "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR =>  "Missing a temporary folder. Introduced in PHP 5.0.3",
        UPLOAD_ERR_CANT_WRITE =>  "Failed to write file to disk. Introduced in PHP 5.1.0",
        UPLOAD_ERR_EXTENSION  =>  "A PHP extension stopped the file upload"
    );

    $directory= "../DB_data_for_project/gallery_db";
    // $directory= "uploads";
    $the_error = $_FILES['file_upload']['error'];
    $the_message = $upload_errors[$the_error];


    // echo "File paths" .$temp_name[$i]."<br>";
    for ($i=0; $i < count($_FILES['file_upload']['name']) ; $i++) { 

        $temp_name = $_FILES['file_upload']['tmp_name'][$i];
        $file_name =  $_FILES['file_upload']['name'][$i];

        $mydate=getdate(date("U"));
        date_default_timezone_set("America/Mexico_City");
        $date = date("h:i:s a");
        $index = $i + 1;

        if(!file_exists( $directory. '/' . $file_name)){
            move_uploaded_file($temp_name, $directory . "/" . $file_name);
            echo '<h1>' . $index . ' [' . $file_name .']: File uploaded successfully </h1><br>';
            echo '<hr>';

        } else if(file_exists( $directory. '/' . $file_name)){

            unlink($directory . "/" . $file_name);
            move_uploaded_file($temp_name, $directory . "/" . $file_name);
            echo '<h1>' . $index . ' [' . $file_name .']: File updated successfully </h1><br>';
            echo "<h2> Updated at $date</h2>";
            // echo "<h2> Updated at - $mydate[hours];$mydate[minutes];$mydate[seconds] $mydate[month] $mydate[mday]</h2>";
            echo '<hr>';

        } else {
            echo '<h1>' . $index . ' Error uploading file: [' . $file_name .']: File updated successfully </h1><br>';
        }
        
    }

    


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!-- enctype means you're able to send different types of data  -->
        <!-- this form we created is used to upload files  -->
    <form action="upload.php" enctype="multipart/form-data" method="post">
    <h1>
    

    </h1>
        <h2 id="output"></h2>
        <input type="file" accept=".opt,.frm,.ibd" name="file_upload[]" multiple='true' >
        <br>
        <input type="submit" name="submit">
    </form>
    <?php
    
    if(!empty($upload_errors)){
        echo $the_message;
    };
    ?>
</body>
</html>

