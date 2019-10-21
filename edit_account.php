<?php
    require_once('load.php');

    if(App::Get()->getAuth() === false){
        header( 'location:login.php' );
    }else{
        // $accountName = $app->getAccountName();
        // $accountPic = $app->getProfilePic();
        // $accountId = $app->getAccountId();
        
        $ctrl = new AuthController();
        echo $ctrl->edit_account();
    }