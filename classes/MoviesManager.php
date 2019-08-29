<?php
    require('load.php');

    class MoviesManager{
        protected static $app;
        protected static $db;

        public function __construct(){
            $this->app = App::Get();
            $this->db = $this->app->getDb();
        }

        // public static function addPoster($title){

        //     $upload_dir = './movies_poster/';

        //     $tmp_name = $_FILES['poster']['tmp_name'];

        //     $new_ext = 'jpg'; //shit !

        //     $ext = pathinfo($tmp_name, PATHINFO_EXTENSION);

        //     //chmod($upload_dir, 0777); //shit!

        //     move_uploaded_file($tmp_name, "$upload_dir"."$title".'.'.$new_ext);

        //     $poster = "$upload_dir"."$title" . "." . $new_ext;

        //     // Replace spaces by _ in path
        //     //$poster = str_replace(" ", "_", $poster);

        //     return $poster;
        // }



        // public static function addMovie($title, $content, $mainActor, $director, $tag, $year, $poster){
        //     try{
        //         //$db = DataBase::getDataBase();
        //         $db = $app->getDb();
        //         $q=$db->prepare('INSERT INTO movies (title, content, mainActor, director, tag, year, poster) VALUES (?, ?, ?, ?, ?, ?, ?)');
        //         $res = $q->execute(array($title, $content, $mainActor, $director, $tag, $year, $poster));
        //         $arr = $q->errorInfo();
        //         print_r($arr);
        //     }catch(PDOException $e){
        //     echo 'Err: '.$e->getMessage();
        //     }
        // }



        public static function add($title, $content, $mainActor, $director, $tag, $year, $uploadFile){

            if(isset($uploadFile)){

                $upload_dir = './movies_poster/';

                $tmp_name = $_FILES['uploadFile']['tmp_name'];

                var_dump(mime_content_type($tmp_name));

                $new_ext = 'jpg'; //shit !

                $ext = pathinfo($tmp_name, PATHINFO_EXTENSION);

                //chmod($upload_dir, 0777); //shit!
                //TODO: MIME type condition else return err message

                move_uploaded_file($tmp_name, "$upload_dir"."$title".'.'.$new_ext);

                $poster = "$upload_dir"."$title" . "." . $new_ext;

            }else{
                $poster = 'movies_poster/default.jpg';
            }

            try{
                global $db;
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