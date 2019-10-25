<?php
    require('load.php');

    class MoviesManager extends BaseController {
        protected $app;
        protected $db;
        protected $moviesList;

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
        public function titleCheck($title){
            global $db;
            $query = $db->prepare('SELECT COUNT(*) FROM movies WHERE title = ?');
            $query->execute(array($title));
            $check = $query->fetchColumn();
            return $check;
        }

        //set movie in database
        public function add_movie($title, $content, $mainActor, $director, $tag, $year, $poster){
            $extension = pathinfo($_FILES['poster']['tmp_name'], PATHINFO_EXTENSION);
            $new_extension = ".jpg";
            move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/posters/'.$title.$new_extension);
            $poster = 'assets/posters/'.$title.$new_extension;

            try{
                //remplace global $db ?
                global $db;
                $query = $db->prepare('INSERT INTO movies (title, content, mainActor, director, tag, year, poster) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $query->execute(array($title, $content, $mainActor, $director, $tag, $year, $poster));
            }catch(PDOException $e){
                echo 'Err: '.$e->getMessage();
            }
        }

        //setup a movie on bdd
        public function setMovie($title, $content, $mainActor, $director, $tag, $year, $poster){
            $this->add_movie($title, $content, $mainActor, $director, $tag, $year, $poster);
        }

        //update movie in bdd
        public function edit_movie($id, $title, $year, $mainActor, $director, $tag, $content, $poster){
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

            if(count($array) == 0){
                return TRUE;
            }

            //substract last comma and space
            $sql = mb_substr($sql, 0, -2) . ' WHERE id = ?';
            $array[] = $id;
            
            try{
                $query = $db->prepare($sql);
                $query->execute($array);

                // $query = $db->prepare('UPDATE movies SET title= :title WHERE id= :id');
                // $query->execute(array(
                //     'title'=>$title,
                //     'id'=>$id
                // ));

                return TRUE;
            }catch(PDOException $e){
                echo 'Err: '.$e->getMessage();
            }
        }

    }