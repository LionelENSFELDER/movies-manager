<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('src/load.php');
    require_once('src/nav_template.php');

    var_dump($passwordCheck);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Signup</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body class="background-dark">
    <section class="vh-100 row h-100">
        <div class="col-sm-12 my-auto">
            <div class="card mb-3 mx-auto p-5 rounded shadow" style="width: 45rem;">
                <form action="signup.php" method="POST">
                    <h1>Create an account</h1>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <div class="form-group">
                            <?php
                                if($passwordCheck === TRUE){
                                    echo 'Passwords must be the same !';
                                }
                            ?>
                            <label for="exampleInputPassword1">Repeat password</label>
                            <input type="password" name="password2" class="form-control" placeholder="Password" required>
                        </div>
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <button class="btn btn-primary" type="submit" value="">Send</button>
                </form>
            </div>
        </div>
    </section>
    </body>
</html>

<?php

if (isset($_POST['name']) AND isset($_POST['password'])){

    if($_POST['password'] === $_POST['password2']){

        $username = $_POST['name'];
        $password = $_POST['password'];
        $res = $user->add_account($username, $password, $db);
        if($res === TRUE){
            header('location:login.php');
        }else if($res === FALSE){
            var_dump($res);
            echo 'Fail !';
        }
    }else{
        // $passwordCheck = TRUE;
        // var_dump($passwordCheck);
    }
}

?>