
<?php

    class Movie{
        protected $id, $title, $tag, $content, $mainActor, $director, $date, $image;

        // public function __construct(array $data){
        //     if(!empty($data)){
        //         $this->hydrate($data);
        //     }
        // }

        public static function CreateNew($data){
            $obj = new Movie;
            $obj->hydrate($data);
            return $obj;
        }

        public function hydrate(array $data){

            foreach($data as $key => $value){

                $method = 'set'.ucfirst($key);

                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        //Setters
        public function setId($id){
            $this->id=$id;
        }

        public function setTitle($title){
            $this->title=$title;
        }

        public function setContent($content){
            $this->content=$content;
        }
        public function setImage($image){
            $this->image=$image;
        }

        //Getters
        public function getId(){return $this->id;}

        public function getTitle(){return $this->title;}

        public function getContent(){return $this->content;}

        public function getImage(){return $this->image;}
    }