<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    //require_once('movies_manager_PDO.php');
    require_once('movies_manager.php');
    require_once('movie.php');
    require_once('movie_view.php');
    require_once('auth_auth.php');
    require_once('auth_class.php');

    // try{
    //     $db = DataBase::getDataBase();
    // }catch(PDOException $e){
    //     echo 'Fail : ' . $e->getMessage();
    // }
?>
