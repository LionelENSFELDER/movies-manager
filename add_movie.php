<?php
    require_once('load.php');

    if(isset($_POST['submit'])){

        //$title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);

        $manager = new MoviesManager;

        //check $title in bdd;
        $res = $manager->add_movie();
        if($res === TRUE){
            //header('location:index.php');
            $err = new Err;
            echo $err->view_error();
        }

    }else{
        if(App::Get()->getAuth() === false){
            header('location:login.php');
        }else{
            $ctrl = new AppController();
            echo $ctrl->add_movie();
        }
    }