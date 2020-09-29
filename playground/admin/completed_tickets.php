<?php require_once "admin_header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h1><b>COMPLETED TICKETS</b></h1>
            <a href="support_tickets.php"><input class="btn btn-primary" type="button" value="View Pending tickets"></a>
                <table class="pure-table">
                <thead>
                    <tr>
                        <th>ID#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Completed on</th>
                        <th>Text</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $contacts = contact::find_all_deleted();
            
                    foreach($contacts as $contact){
                        $text;
                        strlen($contact->text) > 300 ? $text = substr($contact->text,0,300) . '....' : $text = $contact->text;
                        echo "<tr>";
                        echo "<td>{$contact->id}</td>";
                        echo "<td>{$contact->name}</td>";
                        echo "<td>{$contact->email}</td>";
                        echo "<td>{$contact->deleted_at}</td>";
                        echo "<td>{$text}</td>";
                        echo "<td>
                        <a href='open_tickets.php?id={$contact->id}'><input class='btn' type='button' value='Open Ticket'></a>
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