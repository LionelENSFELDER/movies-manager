<?php
    require_once('load.php');
    
    if(App::Get()->getAuth() === false){

        header('location:login.php');

    }else if(isset($_POST['change-username'])){

        $ctrl = new AuthController;
        $ctrl->change_username();

    }else if(isset($_POST['change-password'])){

        $ctrl = new AuthController;
        $ctrl->change_password();
        
    }else if(isset($_POST['update-pic'])){

        $ctrl = new AuthController;
        $ctrl->update_pic();

    }else{
        // $accountId = $app->getAccountId();
        // $accountName = $app->getAccountName();
        // $accountPic = $app->getProfilePic();
        
        $ctrl = new AuthController();
        echo $ctrl->view_account();

    }