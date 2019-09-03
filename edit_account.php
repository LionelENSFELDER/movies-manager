<?php
    require_once('load.php');


    if($auth === false){
        header( 'location:login.php' );
    }


    $ctrl = new AuthController();
    echo $ctrl->edit_account();
    