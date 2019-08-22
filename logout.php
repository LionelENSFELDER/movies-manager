<?php
    require_once('src/load.php');
    $user->logout();
    header('location:index.php');
?>