<?php
    require_once('load.php');

    if(App::Get()->getAuth() === false){
        header( 'location:login.php' );
    }else{
        $ctrl = new AuthController();
        echo $ctrl->edit_account();
    }