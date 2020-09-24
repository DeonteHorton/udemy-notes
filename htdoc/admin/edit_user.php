<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

// checks to see if the session id  is empty. if so, it will redirect you to the photo section in the admin page 
// else it will grab the session id and store it in the photos variables 
if(empty($_GET['id'])){
    redirect("../users.php");
}
    
$user = user::find_by_id($_GET['id']);

if(isset($_POST['update'])){

    if($user){
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
      
        $user->set_file($_FILES['new_file']);
        $user->save_user_and_image();
    }
}




?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           

            <?php include "includes/top_nav.php"; ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


           <?php include "includes/side_nav.php"; ?>


            <!-- /.navbar-collapse -->

        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            EDIT USERS Page
                            <small>Subheading</small>
                        </h1>

                        <div class="col-md-6">
                            <img src="<?php echo $user->user_image();  ?>" alt="">
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload an image file for user image</label>
                                    <input type="file" name="new_file">
                                </div>
                                <div class="form-group">
                                <label for="username">User Name</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control"value="<?php echo $user->password; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control"  value="<?php echo $user->first_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" class="form-control" type="text" value="<?php echo $user->last_name; ?>">
                                </div>
                                <div class="form-group">
                                    <input name="update" class="btn btn-primary pull-right" type="submit">
                                </div>
                            </div>
                            
                        </div>
                    </form>


                    </div>
                </div>
                <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>