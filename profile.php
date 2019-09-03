<?php

    require_once('load.php');
    
    if($auth === false){
        header('location:login.php');
    }
    
    $accountName = $app->getAccountName();
    $accountPic = $app->getProfilePic();

    $ctrl = new AuthController();
    echo $ctrl->profile_view();
?>


