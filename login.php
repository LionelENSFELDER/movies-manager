<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('src/load.php');
    require_once('src/nav_template.php');
?>

<?php
    if (isset($_POST['name']) AND isset($_POST['password'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $res = $user->login($name, $password);
        var_dump($res);
        if($res === TRUE){
            echo 'Bonjour '.$name.' !';
            header("Location: index.php");
        }else{
            echo 'Err: '.$name.' !';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body class="background-dark">
    <section class="vh-100 row h-100">
        <div class="col-sm-12 my-5">
            <div class="card mb-3 mx-auto p-5 rounded shadow" style="width: 45rem;">
                <form action="login.php" method="POST">
                    <h1>Login</h1>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <a type="button" class="btn btn-link p-0" href="signup.php">Don't have an account ?</a>
                        </div>
                    <button class="btn btn-primary" type="submit" value="">Envoyer !</button>
                </form>
            </div>
        </div>
    </section>
    </body>
</html>