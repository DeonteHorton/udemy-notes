<?php require_once "init.php" ?>
<?php

$log_statment;
$user_name;
if(!$session->is_signed_in()){
    $log_statment = "<li><a href='login.php'>Login</a></li>" ;
    $user_name = "<li style='color:green;'>GUEST</li>";
} else {
    $log_statment = "<li><a href='logout.php'>Log Out</a></li>" ;
    $user_name = "<li class='green-txt'>{$_SESSION['user_name']}</li>";
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
<header>
        <!-- nav bar -->
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h1 class="sr-only">Graphic Umbrella</h1>
                        <img src="media/umbrella-img/logo.png" alt="">
                    </div>
                    <!-- nav link -->
                    <div class="col-sm-8 nav-links">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="news.php">news</a></li>
                            <li><a href="about.php">about</a></li>
                            <li><a href="#">features</a></li>
                            <li><a href="contacts.php">contact</a></li>
                            <?php echo $log_statment;  ?>
                            <?php echo $user_name;  ?>
                        </ul>
                    </div>
                    <!-- nav links -->
                </div>
            </div>
   
        </nav>
    </header>
</body>
</html>