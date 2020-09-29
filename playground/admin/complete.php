<?php require_once "admin_header.php"  ?>



<?php

    if(empty($_GET['id'])){
        redirect('support_tickets.php');
    } 

    $user = contact::find_by_id(($_GET['id']));

    if($user){
        $user->delete();
        redirect('support_tickets.php');
    } else {
        redirect('support_tickets.php');
    }

?>