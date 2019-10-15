<?php

    require_once('load.php');
    //require_once('App.php');
    $app = App::Get();
    if($app->getAuth() === false){
        header('location:login.php');
    }else{
        $accountName = $app->getAccountName();
        $accountPic = $app->getProfilePic();
        $ctrl = new AuthController();
        echo $ctrl->profile_view();
    }