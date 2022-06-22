<?php
     require_once '../lib/database.php';
     require_once 'user_update.php';
     require_once 'user_detail.php';

    if(
        isset($_POST) &&
        !empty($_POST['id_subscription'])
    )
    {
    editUserSubscription($_POST);
   
        header("location:user_actions.php?id=".$_GET['id']);

    }
    else{
        
        $id = $_GET['id'];

        $userdetails = userdetails($id);
        $listsubscriptiontype = listSubscriptionType();


    
        include '../templates/user_update.phtml';    
    }

    

?>