<?php require_once "header.php"  ?>
<?php if($session->is_signed_in()) {redirect("../index.php");} ?>


    <?php
    
    if($session->is_signed_in()){
        redirect('index.php');
    }
    // Once the user is logged in, store it in the session and display it in the nav bar 

    $username;
    $password;
    
    if(isset($_POST['submit'])){
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $message;

        $user_found = account::verify_user($username,$password);

        if ($user_found) {
            $message = "<div class='bg-primary'>User was Found</div>";
            $session->login($user_found);
            $_SESSION['user_name'] = $username;
            redirect('index.php');
        } else {
            $message = "<div class='bg-danger'>Your username and/or password is incorrect</div>";
            
        }

    } else {
        $username = '';
        $password = '';
        $message = '';
    }
    
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="green-border"></div>

    <div class="col-md-12 ">
        <h1>Log in:</h1>

        <form action="" method="post">
            <?php echo $message;  ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" placeholder="username" <?php echo htmlentities($username);  ?>>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" placeholder="password" <?php htmlentities($password);  ?>>
            </div>
            <input type="submit" value="Log In" name="submit" class="btn btn-primary">
            <p>Don't have an account?<a style="color:blue;" href="sign_up.php"> &NotLess; Create here</a> </p>


        </form>
    </div>


</body>
</html>