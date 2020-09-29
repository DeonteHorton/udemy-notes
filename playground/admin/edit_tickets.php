<?php require_once "admin_header.php" ?>

    <div class="green-border"></div>

    <?php

    $contacts = contact::find_by_id($_GET['id']);
    if (isset($_POST['submit'])) {

        if ($contacts) {
            $contacts->name = $_POST['name'];
            $contacts->email = $_POST['email'];
            $contacts->text = $_POST['text'];
            
            $contacts->update();
        }
   
    }

    ?>
    
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php echo "<h1><b>{$contacts->name}'s Form/Ticket </b></h1>";  ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input readonly name='name' value='<?php echo $contacts->name;  ?>' type='text' class='form-control'>
                        </div>
                        <div class="form-group">
                        <label for="name">Email:</label>
                            <input name="email" type="text" value='<?php echo $contacts->email ?>' class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="name">Text:</label>
                            <textarea  name="text" id="" cols="30" rows="25"><?php echo $contacts->text ?></textarea>
                        </div>
                        <input class="btn btn-primary" style='background-color:green;' type="submit" value="Submit" name="submit">
                        <?php echo "<a href='complete.php?id={$_GET['id']}'><input class='btn bg-danger' type='button' value='Complete' name='update' class='btn btn-primary'></a>"  ?>
                    </form>
                    <br>
                    <a href="support_tickets.php"><input class="btn btn-primary" type="button" value="Back To Tickets"></a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="../js/script.js"></script>
</body>
</html>

