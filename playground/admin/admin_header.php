<?php require_once "../init.php" ?>
<?php if(!$session->is_signed_in() || $_SESSION['user_name'] !== 'Admin') {redirect('../index.php');}  ?>

<?php

$log_statment;
$user_name;
$admin;
if(!$session->is_signed_in()){
    $log_statment = "<li><a href='login.php'>Login</a></li>" ;
    $user_name = "<li style='color:green;'>GUEST</li>";
    $admin = '';
    redirect('../index.php');
} else {
    $log_statment = "<li><a href='../logout.php'>Log Out</a></li>" ;
    $user_name = "<li class='green-txt'>{$_SESSION['user_name']}</li>";
    $admin = "<li><a href='accounts.php'>View Accounts</a></li> <li><a href='support_tickets.php'>View Forms</a></li>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin_css/style.css">
    <!-- scripts for the pie chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Element','Density',{role:'style'}],
            ['Deleted accounts',  <?php echo account::count_2();  ?>,'red'],
            ['Live Accounts', <?php echo account::count_1();  ?>,'blue'],
            ['Completed Tickets',  <?php echo contact::count_2();  ?>,'blue'],
            ['Open tickets', <?php echo contact::count_1();  ?>,'red'],
        ]);


        var options = {
          title: 'Tickets'
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script>

</head>

<body>
<header>
        <!-- nav bar -->
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1 class="sr-only">Graphic Umbrella</h1>
                        <img src="../media/umbrella-img/logo.png" alt="">
                    </div>
                    <!-- nav link -->
                    <div class="col-sm-9 nav-links">
                        <ul>
                            <li><a href="../index.php">home</a></li>
                            <li><a href="../news.php">news</a></li>
                            <li><a href="../about.php">about</a></li>
                            <li><a href="../#">features</a></li>
                            <li><a href="../contacts.php">contact</a></li>
                            <?php echo $log_statment;  ?>
                            <?php echo $user_name;  ?>
                            <?php echo $admin; ?>
                        </ul>
                    </div>
                    <!-- nav links -->
                </div>
            </div>
   
        </nav>
    </header>
    <div class="green-border"></div>
