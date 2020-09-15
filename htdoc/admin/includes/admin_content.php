<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>
        <?php 
        // we are instantiating the class here, we are pulling the functionality out of the class and placing it into the result_set 

        // gets the user class from the user.php file 

        // fires the find_all_users method in the user.php file 
        
        // $all_users = User::find_all_users();
        // $users = new User();
        // echo '<h1 style="font-weight:bold;">All Users</h1>';
        // while($row = mysqli_fetch_array($all_users)){
            
        //     echo "<h2>User Name: " . $row['username'] . "</h2>";
        //     echo "<h2>User Name: " . $row['password'] . "</h2>";
        //     echo "<h2>First Name: " . $row['first_name'] . "</h2>";
        //     echo "<h2>Last Name: " . $row['last_name'] . "</h2>";
        //     echo "<hr>";
        // }

        $users = User::find_all_users();

        echo '<h1 style="font-weight:bold;">All Users</h1>';
        foreach($users as $user){
            echo "<h2>User Name: " . $user->username . "</h2>";
            echo "<h2>Password: " . $user->password . "</h2>";
            echo "<h2>First Name: " . $user->first_name . "</h2>";
            echo "<h2>Last Name: " . $user->last_name . "</h2>";
            echo "<hr>";
        }

        $found_user_id = User::find_user_by_id(3);
            echo '<h1 style="font-weight:bold;">Single User</h1>';
            echo "<h2>User Name: " . $found_user_id->username . "</h2>";
            echo "<h2>Password: " . $found_user_id->password . "</h2>";
            echo "<h2>First Name: " . $found_user_id->first_name . "</h2>";
            echo "<h2>Last Name: " . $found_user_id->last_name . "</h2>";
            echo "<hr>";

        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->