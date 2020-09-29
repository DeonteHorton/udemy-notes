<?php ob_start() ?>
<?php require_once "init.php" ?>
<?php

$log_statment;
$user_name;
$admin;
if(!$session->is_signed_in()){
    $log_statment = "<li><a href='login.php'>Login</a></li>" ;
    $user_name = "<li style='color:green;'>GUEST</li>";
    $admin = '';
} else {
    $log_statment = "<li><a href='logout.php'>Log Out</a></li>" ;
    $user_name = "<li class='green-txt'>{$_SESSION['user_name']}</li>";

    if ($_SESSION['user_name'] === 'Admin') {
        $admin = "<li><a href='admin/accounts.php'>View Accounts</a></li><li><a href='admin/support_tickets.php'>View Forms</a></li>";
        
    } else {
    $admin = '';
    }
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
</head>
<body>
<header>
        <!-- nav bar -->
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1 class="sr-only">Graphic Umbrella</h1>
                        <img src="media/umbrella-img/logo.png" alt="">
                    </div>
                    <!-- nav link -->
                    <div class="col-sm-9 nav-links">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="news.php">news</a></li>
                            <li><a href="about.php">about</a></li>
                            <li><a href="#">features</a></li>
                            <li><a href="contacts.php">contact</a></li>
                            <?php echo $log_statment;  ?>
                            <?php echo $user_name;  ?>
                            <?php echo $admin; ?>
                            <?php echo $session->count; ?>
                        </ul>
                    </div>
                    <!-- nav links -->
                </div>
            </div>
   
        </nav>
    </header>
