<?php

    class PosterManager{

        public static function add($title){

            $upload_dir = './movies_poster/';

            $tmp_name = $_FILES['poster']['tmp_name'];

            $new_ext = 'jpg'; //shit !

            $ext = pathinfo($tmp_name, PATHINFO_EXTENSION);
            echo $ext;

            chmod($upload_dir, 0777); //??? !

            move_uploaded_file($tmp_name, "$upload_dir"."$title".'.'.$new_ext);

            $poster = "$upload_dir"."$title".'.'.$new_ext;

            return $poster;
        }
    }

?>