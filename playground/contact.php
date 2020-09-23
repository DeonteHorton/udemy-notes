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
    <?php require_once "header.php" ?>
    <div class="green-border"></div>

    <?php
    
    if (isset($_POST['submit'])) {
        echo "<h1>PASSED</h1>";
    }
    
    ?>
    
    <main>
        <div class="container">
            <div class="row">
                <div class="col 12">
                    <form action="contact.php" method="POST">
                        <div class="form-group">

                            <input placeholder="Name" type="text">

                        </div>
                        <div class="form-group">

                            <input type="text" placeholder="Email">

                        </div>
                        <div class="form-group">

                            <textarea placeholder="Question/Concern" name="" id="" cols="30" rows="10"></textarea>

                        </div>
                        <input type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php require_once "footer.php" ?>
</body>
</html>