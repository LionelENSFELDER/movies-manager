<?php
    require_once('load.php');

    
    if(App::Get()->getAuth() === false){//

        header('location:login.php');

    }else if(isset($_POST['edit'])){//return controller view

        $ctrl = new AppController();
        echo $ctrl->edit_movie();

    }else if(isset($_POST['confirmedEdit'])){//movie edited by MoviesManager

        $manager = new MoviesManager;
        $res = $manager->edit_movie();

        if($res === TRUE){
            header('location:index.php');
        }else{
            header('location:404.php');
        }

    }else if(isset($_POST['delete'])){//delete movie without confirm anything

        $manager = new MoviesManager;
        $res = $manager->delete_movie();

        if($res === TRUE){
            header('location:index.php');
        }else{
            header('location:404.php');
        }

    }else{
        header('location: index.php');
    }