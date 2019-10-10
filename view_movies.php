<?php

    require_once('load.php');
    
    $manager = new MoviesManager;
    $list = $manager->getAllMovies();

    $ctrl = new AppController();
    echo $ctrl->view_movies($list);



// if($auth === false){
//     header('location:login.php');
// }

// // OU
// if($app->getAuth() === false){
//     header('location:login.php');
// }

// OU

// if(App::Get()->getAuth() === false){
//     header('location:login.php');
// }