<?php

    class PosterManager{

        public static function add($title){

            $uploadDir = 'movies_poster/';
            $uploadfile = $uploadDir . basename($_FILES['fileToUpload']['name']);
            $path = $_FILES['fileToUpload']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "movies_poster/$title".'.'.$ext);

            $poster = "movies_poster/$title" .'.'.$ext;

            return $poster;
        }
    }

?>