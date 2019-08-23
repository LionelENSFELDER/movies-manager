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
        
        <section class="vw-100">
            <div class="container">
                <div class="row">
                    <div class="card-colums">
                        <?php
                            while($i=$response->fetch()){
                            $card=Movie::CreateNew($i);
                            ?>
                            <div class="card">
                                    <img src="<?php echo $i['poster'];?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title"><?php echo $i['title'];?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <h5 class="card-title"><?php echo $i['title'];?></h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-outline-light btn-sm"><?php echo $i['year'];?></button>
                                                <button type="button" class="btn btn-outline-light btn-sm"><?php echo $i['tag'];?></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <?php
                        }?>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>