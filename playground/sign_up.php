<?php require_once "header.php"  ?>
<?php if($session->is_signed_in()) {redirect("index.php");} ?>


    <?php
    
    if(isset($_POST['create'])){

        $user = new account();
        $mesage;
        if ($user) {
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email = $_POST['email'];
            $user->age = $_POST['age'];

            $user->create();
            redirect('login.php');
        } else {
            $message = " Something went wrong, please try again.";
        }
    } else{
        $messgae  = '';
    }

    
    ?>


    <div class="green-border"></div>

    <div class="col-md-12">

        <div class="signup-form"> 
            <form action="" method="post">
                <h1>Sign up:</h1>
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" placeholder="User name">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="text" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input class="form-control" type="text" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input class="form-control" type="text" name="age" placeholder="Age">
                </div>
                <input type="submit" value="Create" name="create" class="btn btn-primary">
                <p>Already have an account? <a style="color:blue;" href="login.php"> &NotLess; Login</a> </p>

            </form>
        </div>
    </div>


</body>
</html>