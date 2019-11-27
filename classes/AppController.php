<?php

    class AppController extends BaseController {

        // display all movies
        public function view_movies($list) {
            return $this->render('view_movies.twig', [
                'page_title' => 'All Movies',
                'row' => $list->fetchAll(),
                'auth'=> $this->getAuth()
            ]);

        }

        //add a movie in bdd
        public function add_movie(){
            return $this->render('add_movie.twig',[
                'page_title' => 'Add a movie',
                'auth'=> $this->getAuth()
            ]);
        }

        //edit a movie
        public function edit_movie(){

            $id = $_POST['id'];
            $title = $_POST['title'];
            $year = $_POST['year'];
            $mainActor = $_POST['mainActor'];
            $director = $_POST['director'];
            $tag = $_POST['tag'];
            $content = $_POST['content'];

            return $this->render('edit_movie.twig', [
                'page_title' => 'Edit movie',
                'id' => $id,
                'title' => $title,
                'year' => $year,
                'mainActor' => $mainActor,
                'director' => $director,
                'tag' => $tag,
                'content' => $content,
                'auth' => $this->getAuth()
            ]);

        }
    }