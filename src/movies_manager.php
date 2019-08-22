<?php
    require_once('movies_manager_PDO.php');

    class MoviesManager{
        public static function add($title,$content,$mainActor,$director, $tag, $year, $poster){
            try{
                //
                $db = DataBase::getDataBase();
                $q=$db->prepare('INSERT INTO movies (title, content, mainActor, director, tag, year, poster) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $res = $q->execute(array($title, $content, $mainActor, $director, $tag, $year, $poster));
                $arr = $q->errorInfo();
                print_r($arr);
            }catch(PDOException $e){
            echo 'Err: '.$e->getMessage();
            }
        }

        public function delete(){
            
        }

        public function getlist(){
            
        }

        public function getOne(){
            
        }
    }

?>