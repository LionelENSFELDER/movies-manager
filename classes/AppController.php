<?php

class AppController extends BaseController {


    public function view_movies($list) {
        return $this->render('view_movies.twig', [
            'page_title' => 'All Movies',
            'row' => $list->fetchAll()
        ]);

    }
}