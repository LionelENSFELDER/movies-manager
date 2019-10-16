<?php
    require_once('load.php');
    
    if(App::Get()->getAuth() === false){
        header('location:login.php');
    }else{
        header('location:view_movies.php');
    }