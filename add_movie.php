<?php
    require_once('load.php');

    if(isset($_POST['submit'])){

        $manager = new MoviesManager;

        //check $title in bdd;
        $res = $manager->add_movie();
        if($res === TRUE){
            header('location:index.php');
            // $code = '1';
            // $err = new Err;
            // echo $err->view_error($code);
        }

    }else{
        if(App::Get()->getAuth() === false){
            header('location:login.php');
        }else{
            $ctrl = new AppController();
            echo $ctrl->add_movie();
        }
    }