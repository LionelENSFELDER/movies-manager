<?php
    require_once('movies_manager_PDO.php');

    class MoviesManager
    {
        public static function add($title,$content,$mainActor,$director,$tag, $year){
            try{
                //
                $db = DataBase::getDataBase();
                var_dump($db);
                $q=$db->prepare('INSERT INTO movies (title, content, mainActor, director, tag, year) VALUES (?, ?, ?, ?, ?, ?)');
                $res = $q->execute(array($title,$content,$mainActor,$director,$tag, $year));
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