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

    // public function edit_movie(){
    //     return $this->render('add_movie.twig');
    // }

    public function edit_movie($id, $title, $year, $mainActor, $director, $tag, $content, $poster){
        return $this->render('edit_movie.twig', [
            'page_title' => 'Edit movie',
            'id' => $id,
            'title' => $title,
            'year' => $year,
            'mainActor' => $mainActor,
            'director' => $director,
            'tag' => $tag,
            'content' => $content,
            'poster' => $poster,
            'auth' => $this->getAuth()
        ]);
    }
}