<?php require_once "admin_header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><b>ACCOUNTS</b></h1>
                <a href="deleted_accounts.php"><input class="btn btn-primary" type="button" value="View deleted Accounts"></a>
                <table class="pure-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID#</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Account created on</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $accounts = account::find_all();

                        foreach($accounts as $account){
                            echo "<tr>";
                            echo "<td>
                            <a href='edit_account.php?id={$account->id}'><input class='btn btn-primary' type='button' value='Edit'></a>
                            </td>";
                            echo "<td>{$account->id}</td>";
                            echo "<td>{$account->username}</td>";
                            echo "<td>{$account->password}</td>";
                            echo "<td>{$account->first_name}</td>";
                            echo "<td>{$account->last_name}</td>";
                            echo "<td>{$account->email}</td>";
                            echo "<td>{$account->age}</td>";
                            echo "<td>{$account->created_at}</td>";
                            echo "<td>
                            <a href='delete_account.php?id={$account->id}'><input class='btn bg-danger' type='button' value='Delete'></a>
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