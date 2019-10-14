<?php
    require_once('load.php');

    if(isset($_POST['submit'])){

        $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
        $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
        $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
        $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);

        if(isset($_POST['poster'])){
            $poster = $_POST['poster'];
        }else{
            $poster = NULL;
        }

        $manager = new MoviesManager;
        $manager->setMovie($title, $content, $mainActor, $director, $tag, $year, $poster);
        header('location:index.php');
    }else{
        $ctrl = new AppController();
        echo $ctrl->add_movie();
    }