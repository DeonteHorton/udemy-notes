    <?php require_once "header.php" ?>
    <div class="green-border"></div>

    <?php

    $contacts = new contact();
    if (isset($_POST['submit'])) {

        if ($contacts) {
            $contacts->name = $_POST['name'];
            $contacts->email = $_POST['email'];
            $contacts->text = $_POST['text'];
            
            $contacts->support_form();
        }
   
    }

    ?>
    
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h3>Please submit your <span class="green-txt">Question</span> or <span class="green-txt">Statement</span> below</h3>

                    <form action="contacts.php" method="POST">
                        <div class="form-group">

                            <?php
                            
                            if($session->is_signed_in()){
                                echo "<input readonly value='{$_SESSION['user_name']}' name='name' placeholder='{$_SESSION['user_name']}' type='text' class='form-control'>";
                            } else {
                                echo "<input name='name' placeholder='Name' type='text' class='form-control'>";
                            }
                            
                            ?>

                        </div>
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Question/Concern" name="text" id="" cols="30" rows="10"></textarea>
                        </div>
                        <input class="btn btn-primary" style='background-color:green;' type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
            
            <?php
            
            $tickets = contact::find_all();

            foreach ($tickets as $ticket ) {
                echo "<div class='row'>";
                echo "<div class='col-sm-12'>";
                echo "<div class='contact-wrapper'>";
                echo "<h2>Name: {$ticket->name}</h2>";
                echo "<h3>Email: {$ticket->email}</h3>";
                echo "<h4>Form: {$ticket->text}</h4>";
                echo "<div class='dash-line' style='width:auto;height: 1.5px;background-color: rgb(16, 116, 16);'></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
            ?>
        </div>
    </main>

    <?php require_once "footer.php" ?>