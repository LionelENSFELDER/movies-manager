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
                    <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php"><i class="fab fa-youtube fa-sm
                    mr-1"></i>Manager</a>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <?php
                            if($auth === FALSE){
                                ?>
                                <a class="nav-item nav-link" href="signup.php">Signup</a>
                                <a class="nav-item nav-link" href="login.php">Login</a>
                                    
                                <?php
                            }else{
                                ?>
                                <a class="nav-item nav-link" href="add_movie.php"><i class="fas fa-plus-square mr-1"></i>Add a movie</a>
                                <a class="nav-item nav-link" href="profile.php">Profile</a>
                                <a class="nav-item nav-link" href="logout.php">Logout</a>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    </nav>
                </div>
        </section>

        <!--scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

