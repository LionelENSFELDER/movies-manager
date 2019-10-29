<?php

    class Err extends BaseController {


        public function view_error() {
            return $this->render('error.twig', [
                'page_title' => 'Error page',
                'message' => 'Error message message message ok ok ok !'
            ]);
        }
    }
