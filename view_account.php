<?php
    require_once('load.php');
    
    if(App::Get()->getAuth() === false){
        header('location:login.php');
    }else{
        $accountName = $app->getAccountName();
        $accountPic = $app->getProfilePic();
        
        $ctrl = new AuthController();
        echo $ctrl->view_account();
    }