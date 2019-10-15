<?php
    require_once('./load.php');


    if(App::Get()->getAuth() === true){
        header('location:view_movies.php');
    }else{   
        $ctrl = new AuthController();
        echo $ctrl->login();
    }