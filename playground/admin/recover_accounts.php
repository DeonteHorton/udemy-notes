<?php require_once "admin_header.php"  ?>



<?php

    if(empty($_GET['id'])){
        redirect('accounts.php');
    } 

    $user = account::find_by_id(($_GET['id']));

    if($user){
        $user->recover();
        redirect('accounts.php');
    } else {
        redirect('accounts.php');
    }

?>