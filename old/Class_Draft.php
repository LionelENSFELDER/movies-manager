<?php
    // update poster + title when some change hap.
    if(!is_null($title) AND !isset($_POST['poster'])){ //only title has posted

        //
        // $sql .= 'title = ?, ';
        // $array[] = $title;
        //
        try{

            $sql_poster = 'SELECT poster FROM movies WHERE (id = ?)';
            $query_poster = $db->prepare($sql_poster);
            $query_poster->execute(array($id));
            $array_poster = $query_poster->fetchAll(PDO::FETCH_COLUMN, 0);
            $old_poster = $array_poster[0];

        }catch (PDOException $e){
            echo $e->getMessage();
        }

        //$upload_dir = 'assets/posters/';
        $ext_regex = "#\..*#";
        $title_regex = 'assets\/posters\/(.*)\..*';
        //$ext = preg_match($ext_regex, $old_poster);
        $new_poster = 'assets/posters/'.$title.'.jpg';
        //rename file
        rename($old_poster, $new_poster);
        //
        $poster = $new_poster;

        // $sql .= 'poster = ?, ';
        // $array[] = $poster;

    }else if(!is_null($title) AND !empty($_POST['poster'])){ //title and poster has posted
        //
        // $sql .= 'title = ?, ';
        // $array[] = $title;
        $poster = $this->upload_poster($title, $uploaded_file);

        // $sql .= 'poster = ?, ';
        // $array[] = $poster;
        
    }else if(is_null($title) AND isset($_POST['poster'])){ // only poster has posted
        //
        $sql .= 'title = ?, ';
        $array[] = $title;
        //
        try{

            $sql_title = 'SELECT title FROM movies WHERE (id = ?)';
            $query_title = $db->prepare($sql_title);
            $query_title->execute(array($id));
            $array_title = $query_title->fetchAll(PDO::FETCH_COLUMN, 0);
            $current_title = $array_title[0];

            $poster = $this->upload_poster($current_title);

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }






    //upload tests
    if(isset($_FILES['poster']) AND $_FILES['poster']['error'] == 0){

        if(mime_content_type($_FILES['poster']['tmp_name']) == 'image/jpeg'){

            // test size
            if ($_FILES['poster']['size'] <= 1000000){
                // test extensions
                $file_infos = pathinfo($_FILES['poster']['name']);
                $extension_upload = $file_infos['extension'];
                $ext_array = array('jpg');
                // test if in array 
                if (in_array($extension_upload, $ext_array)){

                    $upload_dir = 'assets/posters/';
                    $file_moved = move_uploaded_file($_FILES['poster']['tmp_name'], $upload_dir.$title.'.'.$extension_upload);
                    if($file_moved === TRUE){

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

    }else{

        $poster ='assets/posters/default.jpg';
    }