<!-- ~~~~~ Upload file structures~~~~ -->
 <!-- keys in the associative array
 name - file name
 type - jpg,png,gif,doc,txt
 size - in bytes
 -- temp name is usually saved in a temporary place in the server then it's moved to a permant place
 tmp_name - temporary name
 
 error - the error code -->


<?php
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

    $temp_name = $_FILES['file_upload']['tmp_name'];
    $file_name = $_FILES['file_upload']['name'];
    $directory= "uploads";
    $the_error = $_FILES['file_upload']['error'];

    $the_message = $upload_errors[$the_error];
    if(move_uploaded_file($temp_name, $directory . "/" . $file_name)){
        echo 'File uploaded successfully';
    } else {
        echo $the_message;
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
    
    <?php
    
    if(!empty($upload_errors)){
        echo $the_message;
    }
    
    ?>

    </h1>
        <input type="file" name="file_upload">
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>