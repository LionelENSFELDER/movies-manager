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

        //call add_movie to setup a movie on bdd
        public function setMovie($title, $content, $mainActor, $director, $tag, $year, $poster){
            $this->add_movie($title, $content, $mainActor, $director, $tag, $year, $poster);
        }
        //set movie in database via form
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
    }