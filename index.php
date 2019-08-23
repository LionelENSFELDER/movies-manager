<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('src/load.php');
    require_once('src/nav_template.php');

    try{
        $db = DataBase::getDataBase(); //PDO instance
        $allmovies = 'SELECT * FROM `movies`';
        $response = $db->query($allmovies);
    }catch(PDOException $e){
        echo 'BDD plugin fail : ' . $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Movies Manager</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body class="background-dark">
        

        <section class="">
            <div class="container">
                <div class="row">
                <?php
                    while($i=$response->fetch()){
                        
                        $card=Movie::CreateNew($i);
                        ?>
                        <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                            <div class="card-deck p-4">
                                <div class="card bg-transparent border-0 text-left text-white hover-scale">
                                    <img src="<?php echo $i['poster'];?>" title="" alt="..." class="card-img">
                                    <div class="card-img-overlay rounded">

                                    </div>
                                    <div class="card-footer px-0 bg-transparent">
                                        <h3 class="card-title"><?php echo $i['title'];?></h3>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-outline-light btn-sm"><?php echo $i['year'];?></button>
                                                <button type="button" class="btn btn-outline-light btn-sm"><?php echo $i['tag'];?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card link to modal -->
                                    <a href="#" class="stretched-link" data-toggle="modal" data-target="#card<?php echo $i['id'];?>"></a>  
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                            <div class="modal fade" id="card<?php echo $i['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $i['id'];?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel<?php echo $i['id'];?>"><?php echo $i['title'];?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>
                                            <span class="">Main actor: <?php echo $i['mainActor'];?></span>
                                        </p>
                                        <p>
                                            <span class="">Directortor: <?php echo $i['director'];?></span>
                                        </p>
                                        <p>
                                            <h3>Synopsis</h3>
                                            <?php echo $i['content'];?>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }?> 
                </div>
            </div>
        </section>
    </body>
</html>