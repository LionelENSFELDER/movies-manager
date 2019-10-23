<?php
    require_once('load.php');

    if(App::Get()->getAuth() === false){

        header('location:login.php');

    }else if(isset($_POST['edit'])){
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $mainActor = $_POST['mainActor'];
        $director = $_POST['director'];
        $tag = $_POST['tag'];
        $content = $_POST['content'];
        $poster = $_POST['poster'];

        $ctrl = new AppController();
        echo $ctrl->edit_movie($id, $title, $year, $mainActor, $director, $tag, $content, $poster);
    }else{
        header('location: index.php');
    }