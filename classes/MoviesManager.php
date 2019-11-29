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
                echo 'BDD plugin fail: ' . $e->getMessage();
            }
        }
        //call allMovies to show movies and return moviesList
        /**
         * Undocumented function
         *
         * @return void
         */
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
        /**
         * Undocumented function
         *
         * @return void
         */
        public function set_movie(){

            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            $poster = NULL;

            $this->add_movie($title, $content, $mainActor, $director, $tag, $year, $poster);
        }

        //set movie in database
        /**
         * Undocumented function
         *
         * @return void
         */
        public function add_movie(){

            function prepareData(){

                $data = array();

                $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
                $content=filter_var($_POST['content'], FILTER_SANITIZE_STRING);
                $mainActor=filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
                $director=filter_var($_POST['director'], FILTER_SANITIZE_STRING);
                $tag=filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
                $year=filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);

                $default_poster = 'assets/posters/default.jpg';

                //$poster = $default_poster;


                //upload tests
                if (isset($_FILES['poster']) 
                AND $_FILES['poster']['error'] == 0 
                AND mime_content_type($_FILES['poster']['tmp_name']) == 'image/jpeg' 
                AND $_FILES['poster']['size'] <= 5000000
                ){

                    $upload_dir = 'assets/posters/';
                    $file_infos = pathinfo($_FILES['poster']['name']);
                    $tmp_name = $_FILES['poster']['tmp_name'];
                    $extension_upload = $file_infos['extension'];
                    $valid_extensions = array('jpg', 'jpeg');
                    $check_extension = in_array($extension_upload, $valid_extensions);

                    if ($check_extension === TRUE){
                        $final_name = $upload_dir.$title.'.'.$extension_upload;
                        $move = move_uploaded_file($tmp_name, $final_name);
                        if($move === TRUE){
                            $poster = $final_name;
                        }else{
                            $poster = $default_poster;
                        }
                    }else{
                        $poster = $default_poster;
                    }
                }else{
                    $poster = $default_poster;
                }
                //end upload

                array_push($data, $title, $content, $mainActor, $director, $tag, $year, $poster); //a voir pour changer methode de push arr

                return $data;
            }

            function dbRequest(){
                
                $dataFull = prepareData();

                // for($i = 0; $i <= count($dataFull); $i++){
                    
                // }

                $title=$dataFull[0];
                $content=$dataFull[1];
                $mainActor=$dataFull[2];
                $director=$dataFull[3];
                $tag=$dataFull[4];
                $year=$dataFull[5];
                $poster=$dataFull[6];

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

            $go = dbRequest();

        }

        //update movie in bdd
        public function edit_movie(){

            $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
            $new_title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $new_content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
            $new_mainActor = filter_var($_POST['mainActor'], FILTER_SANITIZE_STRING);
            $new_director = filter_var($_POST['director'], FILTER_SANITIZE_STRING);
            $new_tag = filter_var($_POST['tag'], FILTER_SANITIZE_STRING);
            $new_year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);

            //request build
            $array = array();
            $sql = 'UPDATE movies SET ';
            
            if(!empty($new_title)){
                try{
                    //remplace global $db ?
                    global $db;
                    $sql_poster = 'SELECT poster FROM movies WHERE (id = ?)';
                    $query_poster = $db->prepare($sql_poster);
                    $query_poster->execute(array($id));
                    $array_poster = $query_poster->fetchAll(PDO::FETCH_COLUMN, 0);
                    $old_poster = $array_poster[0];
        
                }catch (PDOException $e){
                    echo $e->getMessage();
                }

                $default_poster = 'assets/posters/default.jpg';
                $upload_dir = 'assets/posters/';

                if($old_poster === $default_poster){
                    //do nothing
                }else if ($old_poster != $default_poster){
                    rename($old_poster, $upload_dir.$new_title.'.jpg');
                    $new_poster = $upload_dir.$new_title.'.jpg';
                }

                $sql .= 'title = ?, ';
                $array[] = $new_title;
            }
            if(!empty($new_content)){
                $sql .= 'content = ?, ';
                $array[] = $new_content;
            }
            if(!empty($new_mainActor)){
                $sql .= 'mainActor = ?, ';
                $array[] = $new_mainActor;
            }
            if(!empty($new_director)){
                $sql .= 'director = ?, ';
                $array[] = $new_director;
            }
            if(!empty($new_tag)){
                $sql .= 'tag = ?, ';
                $array[] = $new_tag;
            }
            if(!empty($new_year)){
                $sql .= 'year = ?, ';
                $array[] = $new_year;
            }
            if(!empty($new_poster)){
                $sql .= 'poster = ?, ';
                $array[] = $new_poster;
            }
            //
            if(count($array) == 0){
                return TRUE;
            }

            //substract last comma and space
            $final_sql = mb_substr($sql, 0, -2) . ' WHERE id = ?';
            $array[] = $id;
            
            try{
                //remplace global $db ?
                global $db;
                $query = $db->prepare($final_sql);
                $query->execute($array);
                if($query->execute($array) === TRUE){
                    return TRUE;
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function update_poster(){

            $id = $_POST['id'];
            $title = $_POST['title'];
            $default_poster = 'assets/posters/default.jpg';
            // define('MB', 1048576);
            //upload tests
            // if (isset($_FILES['new-poster']) AND $_FILES['new-poster']['error'] == 0 AND mime_content_type($_FILES['new-poster']['tmp_name']) == 'image/jpeg' AND $_FILES['new-poster']['size'] <= 5000000){
            if (isset($_FILES['new-poster'])){
                $upload_dir = 'assets/posters/';
                $file_infos = pathinfo($_FILES['new-poster']['name']);
                $tmp_name = $_FILES['new-poster']['tmp_name'];
                $extension_upload = $file_infos['extension'];
                $valid_extensions = array('jpg', 'jpeg');
                $check_extension = in_array($extension_upload, $valid_extensions);

                if ($check_extension === TRUE){
                    $final_name = $upload_dir.$title.'.'.$extension_upload;
                    $move = move_uploaded_file($tmp_name, $final_name);
                    if($move === TRUE){
                        $poster = $final_name;
                    }else{
                        $poster = $default_poster;
                    }
                }else{
                    $poster = $default_poster;
                }
            }else{
                $poster = 'assets/posters/Anna.jpg';
            }
            //end upload tests

            try{
                //remplace global $db ?
                global $db;
                $query = $db->prepare('UPDATE movies SET poster = ? WHERE id = ?');
                $query->execute(array($poster, $id));
                if($query->execute() === TRUE){
                    return TRUE;
                }
            }catch(PDOException $e){
                echo 'Err: '.$e->getMessage();
            }
        }

        public function delete_movie(){

            $id = $_POST['id'];

            //remplace global $db ?
            global $db;

            try{
                //remplace global $db ?
                global $db;
                $sql_poster = 'SELECT poster FROM movies WHERE (id = ?)';
                $query_poster = $db->prepare($sql_poster);
                $query_poster->execute(array($id));
                $array_poster = $query_poster->fetchAll(PDO::FETCH_COLUMN, 0);
                $poster_to_delete = $array_poster[0];
            }catch (PDOException $e){
                echo $e->getMessage();
            }

            $default_poster = 'assets/posters/default.jpg';

            if($poster_to_delete === $default_poster){
                //do nothing
            }else{
                unlink($poster_to_delete);
            }

            try{
                $sql = 'DELETE FROM movies WHERE (id = ?)';
                $st = $db->prepare($sql);
                $st->execute(array($id));
                if($st->execute(array($id)) === TRUE){
                    return TRUE;
                }
            }catch (PDOException $e){
                echo 'Err: '.$e->getMessage();
                return FALSE;
            }
        }

    }