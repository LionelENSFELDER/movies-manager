<?php

class AppController extends BaseController {


    public function view_movies($list) {
        return $this->render('view_movies.twig', [
            'page_title' => 'All Movies',
            'row' => $list->fetchAll(),
            'auth'=> $this->getAuth()
        ]);

    }

    public function add_movie(){
        return $this->render('add_movie.twig',[
            'page_title' => 'Add a movie',
            'auth'=> $this->getAuth()
        ]);
    }

    public function edit_movie(){
        return $this->render('add_movie.twig');
    }
}