<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('src/load.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signout</title>
</head>
<body>
    <form action="signout.php" method="post" class="m-5">
        <button type="submit" class="btn btn-success" name="submit">Signout</button>
    </form>
</body>
</html>


<?php


$user_logout = $_POST['submit'];
    if(isset($user_logout)){
        $user->logout();
        header('Location: index.php');
    }
?>