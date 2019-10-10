<?php

    require_once('load.php');
    
    // if($auth === false){
    //     header('location:login.php');
    // }

    // // OU
    // if($app->getAuth() === false){
    //     header('location:login.php');
    // }

    // OU
    
    if(App::Get()->getAuth() === false){
        header('location:login.php');
    }else{
        header('location:view_movies.php');
    }
    
    //$accountName = $app->getAccountName();
    //$accountPic = $app->getProfilePic();

    // $ctrl = new AppController();
    // echo $ctrl->view_movies();