<?php require_once "admin_header.php" ?>


<?php


$user = account::find_by_id(($_GET['id']));


if(isset($_POST['update'])){
    // we are assigning this to object properties 
    if($user){
        
        $user->username = $_POST['username'];
        $user->password =  $_POST['password'];
        $user->first_name =  $_POST['first_name'];
        $user->last_name =  $_POST['last_name'];
        $user->email =  $_POST['email'];
        $user->age =  $_POST['age'];
        $user->deleted_at = null;

        $user->update();

    }

}

?>

    <div class="col-md-12">

        <div class=""> 
            <form action="" method="post">
                <!-- Users account information -->
                <?php echo "<h1><b>{$user->username}'s account</b></h1>";  ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $user->username ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="text" name="password" value="<?php echo $user->password ?>">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $user->email ?>">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input class="form-control" type="text" name="age" value="<?php echo $user->age ?>">
                </div>
                <input type="submit" value="Update" name="update" class="btn btn-primary">
                
                <?php echo "<a href='delete_account.php?id={$_GET['id']}'><input class='btn bg-danger' type='button' value='Delete' name='update' class='btn btn-primary'></a>"  ?>
                
            </form>
            <br>
            <a href="accounts.php"><input class="btn btn-primary" type="button" value="Back To Accounts"></a>
        </div>
    </div>
</body>
</html>