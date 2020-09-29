<?php require_once "admin_header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><b>DELETED ACCOUNTS</b></h1>
                <a href="accounts.php"><input class="btn btn-primary" type="button" value="View Normal Accounts"></a>
                <table class="pure-table">
                    <thead>
                        <tr>
                            <th>ID#</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Account created on</th>
                            <th>Account deleted on</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $accounts = account::find_all_deleted();

                        foreach($accounts as $account){
                            echo "<tr>";
                            echo "<td>{$account->id}</td>";
                            echo "<td>{$account->username}</td>";
                            echo "<td>{$account->password}</td>";
                            echo "<td>{$account->first_name}</td>";
                            echo "<td>{$account->last_name}</td>";
                            echo "<td>{$account->email}</td>";
                            echo "<td>{$account->age}</td>";
                            echo "<td>{$account->created_at}</td>";
                            echo "<td>{$account->deleted_at}</td>";
                            echo "<td>
                            <a href='recover_accounts.php?id={$account->id}'><input class='btn btn-primary' type='button' value='Recover'></a>
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