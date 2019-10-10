<?php

interface DOMView {
    public function render();
};

class MovieView implements DOMView {

    protected $movie;

    function __construct($movie){
        $this->movie = $movie;
    }

    public function render(){
        return '<p>'.$this->movie->getTitle().'</p>';
    }

    // Helpers ideas
    public static function RenderImmediate($movie){
        $view = new MovieView($movie);

        return $view->render();
    }

    public static function RenderImmediateData($data){
        $movie = Movie::CreateNew($data);

        return self::RenderImmediate($movie);
    }
}