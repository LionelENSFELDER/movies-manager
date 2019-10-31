<?php
    require('load.php');

    class MoviesManager extends BaseController {
        protected $app;
        protected $db;
        protected $moviesList;

        //MIME type array
        protected $mime_type = array(
            'jpg'=>'image/jpeg',
            'jpeg'=>'image/jpeg',
            'png'=>'image/png',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml'
        );

        public function __construct(){
            $this->app = App::Get();
            $this->db = $this->app->getDb();
            $this->allMovies();
        }

        //get movies from bdd
        public function allMovies(){
            try{
                $query = 'SELECT * FROM `movies`';
                $this->moviesList = $this->db->query($query);
            }catch(PDOException $e){
                echo 'BDD plugin fail : ' . $e->getMessage();
            }
        }
        //call allMovies to show movies and return moviesList
        public function getAllMovies(){
            $this->allMovies();
            return $this->moviesList;
        }

        //check if movie already exist
        public function check(){

            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            $poster = NULL;


            global $db;
            $query = $db->prepare('SELECT COUNT(*) FROM movies WHERE title = ?');
            $query->execute(array($title));
            $check = $query->fetchColumn();

            if($check > 0){
                header('location:double-title-found.php');
            }else{
                $this->add_movie($title, $content, $mainActor, $director, $tag, $year, $poster);
            }
        }

        //call add_movie();
        public function set_movie(){

            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            $poster = NULL;

            // if(isset($_POST['poster'])){
            //     $poster = $_POST['poster'];
            // }else{
            //     $poster = NULL;
            // }

            $this->add_movie($title, $content, $mainActor, $director, $tag, $year, $poster);
        }

        //set movie in database
        public function add_movie(){
            
            

            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            //$uploaded_file = $_POST['poster'];


            // upload tests
            if (isset($_FILES['poster']) AND $_FILES['poster']['error'] == 0){

                if(mime_content_type($_FILES['poster']['tmp_name']) == 'image/jpeg'){

                    // test size
                    if ($_FILES['poster']['size'] <= 1000000){
                        // test extensions
                        $file_infos = pathinfo($_FILES['poster']['name']);
                        $extension_upload = $file_infos['extension'];
                        $ext_array = array('jpg', 'jpeg', 'gif', 'png');
                        // test if in array 
                        if (in_array($extension_upload, $ext_array)){
                            $upload_dir = 'assets/posters/';
                            move_uploaded_file($_FILES['poster']['tmp_name'], $upload_dir.$title.'.'.$extension_upload);
                            $poster = $upload_dir.$title.'.'.$extension_upload;
                        }else{
                            $poster ='assets/posters/default.jpg';
                        }
                    }else{
                        $poster ='assets/posters/default.jpg';
                    }
                }else{
                    $poster ='assets/posters/default.jpg';
                }

            }else{
                $poster ='assets/posters/default.jpg';
            }

            

            //check if $title already exist
            global $db;
            $query = $db->prepare('SELECT COUNT(*) FROM movies WHERE title = ?');
            $query->execute(array($title));
            $check = $query->fetchColumn();

            if($check > 0){
                header('location:double-title-found.php');
            }else{
                try{
                    //remplace global $db ?
                    global $db;
                    $query = $db->prepare('INSERT INTO movies (title, content, mainActor, director, tag, year, poster) VALUES (?, ?, ?, ?, ?, ?, ?)');
                    $query->execute(array($title, $content, $mainActor, $director, $tag, $year, $poster));
                    return TRUE;
                }catch(PDOException $e){
                    echo 'Err: '.$e->getMessage();
                }
            }

        }

        //update movie in bdd
        public function edit_movie(){

            $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
            $mainActor = filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $director = filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $tag = filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            //$uploaded_file = $_POST['poster'];

            //request build
            global $db;

            $array = array();
            $sql = 'UPDATE movies SET ';
            
            if(!is_null($title)){
                $sql .= 'title = ?, ';
                $array[] = $title;
            }

            if(!is_null($year)){
                $sql .= 'year = ?, ';
                $array[] = $year;
            }

            if(!is_null($mainActor)){
                $sql .= 'mainActor = ?, ';
                $array[] = $mainActor;
            }

            if(!is_null($director)){
                $sql .= 'director = ?, ';
                $array[] = $director;
            }

            if(!is_null($tag)){
                $sql .= 'tag = ?, ';
                $array[] = $tag;
            }

            if(!is_null($content)){
                $sql .= 'content = ?, ';
                $array[] = $content;
            }

            // if(!is_null($poster)){
            //     $sql .= 'poster = ?, ';
            //     $array[] = $poster;
            // }

            if(count($array) == 0){
                return TRUE;
            }

            //substract last comma and space
            $sql = mb_substr($sql, 0, -2) . ' WHERE id = ?';
            $array[] = $id;
            
            try{
                $query = $db->prepare($sql);
                $query->execute($array);
                return TRUE;
            }catch(PDOException $e){
                echo 'Err: '.$e->getMessage();
            }
        }

        public function update_poster(){

            $id = $_POST['id'];
            $title = $_POST['title'];

            // upload tests
            if (isset($_FILES['poster']) AND $_FILES['poster']['error'] == 0){

                if(mime_content_type($_FILES['poster']['tmp_name']) == 'image/jpeg'){

                    // test size
                    if ($_FILES['poster']['size'] <= 10000000){
                        // test extensions
                        $file_infos = pathinfo($_FILES['poster']['name']);
                        $extension_upload = $file_infos['extension'];
                        $ext_array = array('jpg');
                        // test if in array 
                        if (in_array($extension_upload, $ext_array)){
                            $upload_dir = 'assets/posters/';
                            move_uploaded_file($_FILES['poster']['tmp_name'], $upload_dir.$title.'.'.$extension_upload);
                            return TRUE;
                            //$poster = $upload_dir.$title.'.'.$extension_upload;
                        }else{
                            return FALSE;
                        }
                    }else{
                        return FALSE;
                    }
                }else{
                    return FALSE;
                }

            }else{
                return FALSE;
            }
        }

        public function delete_movie(){

            $id = $_POST['id'];
            global $db;

            try{
                $sql = 'DELETE FROM movies WHERE (id = ?)';
                $st = $db->prepare($sql);
                $st->execute(array($id));
            }catch (PDOException $e){
                echo $e->getMessage();
                return FALSE;
            }
            
            //
            return TRUE;
        }

    }
