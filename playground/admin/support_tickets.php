<?php require_once "admin_header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h1><b>SUPPORT TICKETS</b></h1>
            <a href="completed_tickets.php"><input class="btn btn-primary" type="button" value="View Completed tickets"></a>
                <table class="pure-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Text</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $contacts = contact::find_all();
            
                    foreach($contacts as $contact){
                        $text;
                        strlen($contact->text) > 300 ? $text = substr($contact->text,0,300) . '....' : $text = $contact->text;
                        echo "<tr>";
                        echo "<td>
                        <a href='edit_tickets.php?id={$contact->id}'><input class='btn btn-primary' type='button' value='Edit'></a>
                        </td>";
                        echo "<td>{$contact->id}</td>";
                        echo "<td>{$contact->name}</td>";
                        echo "<td>{$contact->email}</td>";
                        echo "<td>{$text}</td>";
                        echo "<td>
                        <a href='complete.php?id={$contact->id}'><input class='btn' type='button' value='Complete'></a>
                        </td>";
                        echo "<tr>";
                    }
                    
                    ?>
                    
                </tbody>
                </table>
                <div id="barchart" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
</body>
</html>