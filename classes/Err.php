<?php

    class Err extends BaseController {

        public function view_error($code) {
            $array = array('number 1', 'Le type de fichier n\'est pas celui attendu');

            switch ($code){
                case '1':
                $message = $array[0];
                break;

                case '2';
                $message = $array[1];
                break;
            }
            return $this->render('error.twig', [
                'page_title' => 'Error page',
                'message' => $message
            ]);
        }
    }
