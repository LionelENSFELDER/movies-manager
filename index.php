<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    // require_once('header_template.php');
    // require_once('movies_manager_PDO.php');
    // require_once('movie.php');
    // require_once('movie_view.php');

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
                        <div class="col-4 mb-4">
                            <div class="card-deck">
                                <div class="card bg-transparent border-0 text-left text-white hover-scale">
                                    <img src="<?php echo $i['image'];?>" title="" alt="..." class="card-img">
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

        <!--scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </body>
</html>