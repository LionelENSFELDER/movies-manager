<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting( E_ALL );

    require_once('load.php');
    if($auth === false){
        header('location:index.php');
    }
?>

<?php
    if(isset($_POST['title'])){

        $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
        $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
        $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
        $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
        if(isset($_POST['poster'])){
            $uploadFile = $_POST['poster'];
        }else{
            $uploadFile = NULL;
        }
        
        // $poster = MoviesManager::addPoster($title);

        // if(isset($poster)){
        //     MoviesManager::addMovie($title,$content,$mainActor,$director,$tag,$year,$poster);
        //     header('location:index.php');
        // }

        MoviesManager::add($title,$content,$mainActor,$director,$tag,$year,$uploadFile);
        header('location:add.php');
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
        <section class="vh-100 row h-100">
            <div class="col-12">
                <div class="card mb-3 mx-auto p-5 rounded shadow" style="width: 45rem;">
                <h1>Add a movie</h1>
                <form method="POST" action="add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                    </div>
                    <div class="form-group">
                        <label for="mainActor">Main actor</label>
                        <input type="text" class="form-control" id="mainActor" name="mainActor" placeholder="Main actor">
                    </div>
                    <div class="form-group">
                        <label for="director">Director</label>
                        <input type="text" class="form-control" id="director" name="director" placeholder="Director">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Enter synopsis"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag <span class="text-danger">(only one for now)</span></label>
                        <select id="tag" name="tag" class="form-control" required>
                            <option>UNTAGGED</option>
                            <option>SCI-FI</option>
                            <option>DRAMA</option>
                            <option>COMEDY</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster <span class="text-danger">(.jpg only)<span></label>
                        <input type="file" class="form-control-file" id="poster" name="poster" accept=".jpg">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </body>
</html>