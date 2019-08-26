<?php
    require_once('movies_manager_PDO.php');

    class MoviesManager{

        public static function addPoster($title){

            $upload_dir = './movies_poster/';

            $tmp_name = $_FILES['poster']['tmp_name'];

            $new_ext = 'jpg'; //shit !

            $ext = pathinfo($tmp_name, PATHINFO_EXTENSION);

            //chmod($upload_dir, 0777); //shit!

            move_uploaded_file($tmp_name, "$upload_dir"."$title".'.'.$new_ext);

            $poster = "$upload_dir"."$title".'.'.$new_ext;

            // Replace spaces by _ in path
            //$poster = str_replace(" ", "_", $poster);

            return $poster;
        }

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

    }

?>