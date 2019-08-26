<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('load.php');
    //require_once('src/nav_template.php');

    if($auth === false){
        header( 'location:login.php' );
    }

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Edit Account</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body class="background-dark">
        <section class="vh-100 row h-100">
            <div class="col-sm-12 my-5">
                <div class="card mb-3 mx-auto p-5 rounded shadow" style="width: 45rem;">
                    <form action="edit_account.php" method="POST">
                        <h1>Hello <?php echo $accountName ?></h1>
                        <div class="d-flex flex-row justify-content-center">
                            <img src="<?php echo $accountPic ?>" alt="..." class="mx-auto" style="width:30%;">
                        </div>
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="<?php echo $accountName ?>">

                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="*******" required>

                        <div class="mt-3">
                            <a type="submit" name="cancel" class="btn btn-outline-warning" href="profile.php">Cancel</a>
                            <a type="submit" name="submit" class="btn btn-outline-info">Send</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        if($_POST['name']===null){
            $username=$accountName;
            $password = $_POST['password'];
            $accountId = $user->getAccountId();
            $user->edit_account($accountId, $db, $username, $password);
            header('location:profile.php');
        }else{
            $username = $_POST['name'];
            $password = $_POST['password'];
            $accountId = $user->getAccountId();
            $user->edit_account($accountId, $db, $username, $password);
            header('location:profile.php');
        }
    }else{
        echo 'Nothing posted';
    }
?>