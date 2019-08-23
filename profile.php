<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('src/load.php');
    require_once('src/nav_template.php');

    if($auth === false){
        header( 'location:login.php' );
    }

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body class="background-dark">
        <section class="vh-100 row h-100">
            <div class="col-sm-12 my-5">
                <div class="card mb-3 mx-auto p-5 rounded shadow" style="width: 45rem;">
                    <form method="POST" action="">
                        <h1>Hello <?php echo $accountName ?></h1>
                        <div class="d-flex flex-row justify-content-center">
                            <img src="<?php echo $accountPic ?>" alt="..." class="mx-auto" style="width:30%;">
                        </div>
                        <label for="">Name</label>
                        <input type="name" class="form-control" placeholder="<?php echo $accountName ?>" readonly>

                        <label for="">Password</label>
                        <input type="name" class="form-control" placeholder="*******" readonly>

                        <div class="mt-3">
                            <a type="button" class="btn btn-outline-warning" href="edit_account.php">Edit</a>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>



    </body>
</html>

