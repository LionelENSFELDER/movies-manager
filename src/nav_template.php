<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('load.php');
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <section class="mb-5">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fab fa-youtube fa-sm
                 mr-1"></i>Manager</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php
                    //var_dump($auth);
                        if($auth === FALSE){
                            ?>
                            <a class="nav-item nav-link" href="signup.php">Signup</a>
                            <a class="nav-item nav-link" href="login.php">Login</a>
                                
                            <?php
                        }else{
                            ?>
                            <li class="nav-item">
                                <a type="button" class="nav-link" href="add_movie.php"><i class="fas fa-plus-square mr-1"></i>Add a movie</a>
                            </li>
                            <a class="nav-item nav-link" href="profile.php">Profile</a>
                            <a class="nav-item nav-link" href="logout.php">Logout<i class="fas fa-sign-out-alt ml-1"></i></a>
                            <?php
                        }
                        ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                </nav>
            </div>
    </section>
    </body>
</html>

